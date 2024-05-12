<?php
spl_autoload_register('controllerAutoLoader');
function controllerAutoLoader($controllerName) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'controllers') !== false) {
        $path = '../controllers/';
    }
    else {
        $path = "controllers/";
    }
    $extension = ".php";
    $fullPath = $path . $controllerName . $extension;

    if(!file_exists($fullPath)) {
        return false;
    }
    require_once $fullPath;
}

