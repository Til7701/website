<?php

namespace view;

use model\PostEntry;

class View
{

    private array $templates = array();
    private array $postHierarchy = array();
    private ?PostEntry $currentPost = null;
    private string $title = "Til7701";
    private array $cssFiles = array();
    private array $jsFiles = array();

    public function setTemplates($templates): View
    {
        $this->templates = $templates;
        return $this;
    }

    public function setPostHierarchy(array $postHierarchy): View
    {
        $this->postHierarchy = $postHierarchy;
        return $this;
    }

    public function setCurrentPost(PostEntry $currentPost): View
    {
        $this->currentPost = $currentPost;
        return $this;
    }

    public function setTitle($title): View
    {
        $this->title = $title;
        return $this;
    }

    public function setCss($css): View
    {
        $this->cssFiles = $css;
        return $this;
    }

    public function setJs($js): View
    {
        $this->jsFiles = $js;
        return $this;
    }

    public function render(): string
    {
        # store in local variables for easier access
        $templates = $this->templates;
        $post_hierarchy = $this->postHierarchy;
        $current_post = $this->currentPost;
        $title = $this->title;
        $css_files = $this->cssFiles;
        $js_files = $this->jsFiles;


        $html = Head::create($title, $css_files, $js_files);

        ob_start();
        ?>

        <body>
        <?php
        include "../php/templates/header.php";

        foreach ($templates as $template) {
            include "../php/templates/" . $template;
        }

        include "../php/templates/footer.php";
        ?>
        </body>

        </html>
        <?php

        $html .= ob_get_contents();
        ob_end_clean();

        return $html;
    }
}
