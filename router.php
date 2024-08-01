<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];  //path_url separa l url nelle sue parti, dominio query etc...

// if ($uri === '/') {
//     require 'controllers/index.php';
// } else if ($uri === '/about') {
//     require 'controllers/about.php';
// } else if ($uri === '/contact') {
//     require 'controllers/contact.php';
// }

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php'
];



function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(Response::NOT_FOUND);
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/$code.php";

    die();
}

routeToController($uri, $routes);