<?php

namespace controller;

use dao\PostDAO;
use dao\PostDAOFactory;
use model\additionalData\AdditionalData;
use model\Post;
use view\View;

class PostController
{

    private PostDAO $postDAO;
    private string $path;
    private ?AdditionalData $additionalData;

    public function __construct(string $path, ?AdditionalData $additionalData)
    {
        $this->path = $path;
        $this->postDAO = PostDAOFactory::create();
        $this->additionalData = $additionalData;
    }

    public function work(): string
    {
        $posts = $this->postDAO->findAllInHierarchyForNav();
        $currentPost = $this->postDAO->findAccessibleByPath($this->path);

        if ($currentPost instanceof Post) {
            $css = $currentPost->getCss();
            if (!$currentPost->isShowToC()) {
                $css[] = "hidden-toc";
            }
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setCurrentPost($currentPost)
                ->setTemplates(array("navigation.php", $currentPost->getTemplate()))
                ->setTitle($currentPost->getTitle())
                ->setCss($css)
                ->setJs($currentPost->getJs())
                ->setAdditionalData($this->additionalData);
        } else {
            http_response_code(404);
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setTemplates(array("navigation.php", "error/pageNotFound.php"))
                ->setTitle("Page not found")
                ->setCss(array("hidden-toc", "error-page"));
        }
        return $view->render();
    }
}
