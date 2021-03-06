<?php
/**
 * Created by PhpStorm.
 * User: florianauderset
 * Date: 04.12.15
 * Time: 11:51
 */

function __autoload($class_name) {

    $dirs = [
        '/myshop/lib/models/',
        '/myshop/lib/controllers/',
        '/myshop/lib/views/',
        '/myshop/lib/yaml/',
        '/myshop/lib/service/'
    ];

    $root = $_SERVER['DOCUMENT_ROOT'];

    // try to load class
    foreach ($dirs as $dir) {
        $file = $root . $dir . $class_name . ".php";
        $file = str_replace("\\", "/", $file);
        if (file_exists($file)) {
            require_once($file);
            
            break;
        }
    }
}