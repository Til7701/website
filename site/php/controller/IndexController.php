<?php

namespace controller;

use dao\PostDAO;
use dao\PostDAOFactory;
use model\Post;
use view\View;

class IndexController
{

    private PostDAO $postDAO;
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->postDAO = PostDAOFactory::create();
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
                ->setCss($css);
        } else {
            http_response_code(404);
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setTemplates(array("navigation.php", "error/pageNotFound.php"))
                ->setTitle("Page not found")
                ->setCss(array("hidden-toc"));
        }
        return $view->render();
    }
}
