<?php

namespace controller;

use dao\PostDAO;
use dao\PostDAOFactory;
use model\Post;
use view\View;

class PostController
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
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setCurrentPost($currentPost)
                ->setTocTemplate($currentPost->getTocTemplate())
                ->setTemplates($currentPost->getTemplates())
                ->setTitle($currentPost->getTitle())
                ->setCss($css)
                ->setJs($currentPost->getJs());
        } else {
            http_response_code(404);
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setTemplates(array("error/pageNotFound.php"))
                ->setTitle("Page not found")
                ->setCss(array("error-page"));
        }
        return $view->render();
    }
}
