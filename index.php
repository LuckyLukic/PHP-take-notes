<?php

require 'functions.php';

// require 'router.php';

require 'Database.php';

$config = require 'config.php';

$db = new Database($config['database']);
$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = ?";  //never inline userdata else we might be under malicious attack!

$posts = $db->query($query, [$id])->fetch();

dd($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";

// }


// $post = $db->query("SELECT * FROM posts WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

// dd($post);




