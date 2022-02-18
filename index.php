<?php
//autoload classes
spl_autoload_register(

function ($className)
{
    if (is_file('./classes/'.$className.'.php')){
    require_once './classes/'.$className.'.php';
    }
    else if(is_file('./controller/'.$className.'.php')){
        require_once './controller/'.$className.'.php';
    }
}

);

$a = new Route();