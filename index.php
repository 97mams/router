<?php
require './vendor/autoload.php';

$route = new App\Route\Router($_SERVER['REQUEST_URI']);

$route->get('/', function () {
    echo "Home page";
});
$route->get('/posts', function () {
    echo "Tous les articles";
});
$route->get('/posts/:id-:slug', function ($id, $slug) {
    echo $slug . ' : ' . $id;
})->with('id', '[0-9]+')->with('slug', '([a-z\0-9]+)');

$route->post('/posts/:id', function ($id) {
    echo $id, $_POST["name"];
});

$route->run();
