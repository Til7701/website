<?php
$baseDir = dirname(__DIR__);

spl_autoload_register(function ($class_name) use ($baseDir) {
    $class_file = str_replace('\\', '/', $class_name) . '.php';
    $class_file = preg_replace('#^php/#', '', $class_file);
    $path = $baseDir . '/' . $class_file;

    if (file_exists($path)) {
        require_once $path;
    }
});
