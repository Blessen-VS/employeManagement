<?php
$routes = require("route.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



if (array_key_exists($uri, $routes)){
    require $routes[$uri];
}
?>