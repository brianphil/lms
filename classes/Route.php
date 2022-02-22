<?php

//====import routes =====// 
require_once('./Routes.php');
//====declare the main Route class====//
class Route
{
    //===create an array of all routes===//
    public static $validRoutes = array();

    //====set each route ====//
    public static function set($route, $function)
    {

        self::$validRoutes[] = $route;
        //===route each request to the appropriate path===///
        if ($_GET['url'] == $route) {

            ///===instantiate each route====///
            $function->__invoke();
        }
    }
}
