<?php

namespace controller;

use dao\PostDAO;
use dao\PostDAOFactory;
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
        $posts = $this->postDAO->findAllInHierarchy();
        $currentPost = $this->postDAO->findByPath($this->path);

        if ($currentPost) {
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setCurrentPost($currentPost)
                ->setTemplates(array("navigation.php", $currentPost->getTemplate()))
                ->setTitle($currentPost->getTitle())
                ->setCss($currentPost->getCss());
        } else {
            http_response_code(404);
            $view = (new View())
                ->setPostHierarchy($posts)
                ->setTemplates(array("navigation.php", "error/postNotFound.php"))
                ->setTitle("Page not found");
        }
        return $view->render();
    }
}
