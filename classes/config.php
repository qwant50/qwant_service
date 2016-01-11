<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define ('DIRSEP', DIRECTORY_SEPARATOR);
define ('ROOT_CLASSES', realpath(__DIR__). DIRSEP);
define ('ROOT_PAGES', realpath(__DIR__). DIRSEP. '..'. DIRSEP. 'pages'. DIRSEP);


function __autoload($class_name) {
    $filename = $class_name . '.php';
    $file = ROOT_CLASSES . $filename;
    if (file_exists($file)) require_once $file;
}

$registry = new Registry;

require_once ROOT_CLASSES . 'session.php';