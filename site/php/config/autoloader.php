<?php
spl_autoload_register(function ($class_name) {
    $class_file = str_replace("\\", "/", $class_name) . ".php";
    $class_file = str_replace("model", "php/model", $class_file);
    $class_file = str_replace("dao", "php/dao", $class_file);
    $class_file = str_replace("view", "php/view", $class_file);
    $class_file = str_replace("utils", "php/utils", $class_file);
    $class_file = str_replace("controller", "php/controller", $class_file);
    if (file_exists($class_file)) {
        include_once $class_file;
    }
});
