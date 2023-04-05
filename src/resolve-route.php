<?php

function resolve($route)
{

    $path = $_SERVER['PATH_INFO'] ?? '/';
    $route = '/^' . str_replace('/', '\/',$route) . '$/';

    if (preg_match($route, $path, $params)) {
        // die('estou aqui');
        //echo'<pre>'; print_r($params);exit;
        return $params;
    }

    return false;
}
