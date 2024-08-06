<?php

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {


    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');


$router = new Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);






// $id = $_GET['id'];

// $query = "SELECT * FROM posts WHERE id = ?";  //never inline userdata else we might be under malicious attack!

// $posts = $db->query($query, [$id])->fetch();

// dd($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";

// }


// $post = $db->query("SELECT * FROM posts WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

// dd($post);




