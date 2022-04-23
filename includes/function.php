<?php

function classAutoLoader($class){
    $class = strtolower($class);
    $the_path = "classes/{$class}.php";
    if(file_exists($the_path)){
        require_once $the_path;
    } else{
        die("the file {$class}.php does not exists");

    }
}

spl_autoload_register('classAutoLoader');