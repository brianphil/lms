<?php
class Controller extends Database
{
    public static function createView($viewName)
    {
        if (is_file('./views/' . strtolower($viewName) . '.php'))
            require_once './views/' . strtolower($viewName) . '.php';
    }
}
