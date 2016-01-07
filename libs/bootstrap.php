<?php

/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 29-Nov-15
 * Time: 12:49
 */
class Bootstrap
{
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = __ROOT__ . 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require __ROOT__ . 'controllers/error.php';
            $controller = new Error();
            return false;
        }
        $controller = new $url[0];
        if (isset($url[2])) {
            $controller->$url[1]($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->$url[1]();
            }
        }
    }
}