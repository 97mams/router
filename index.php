<?php
require './vendor/autoload.php';

$route = new App\Route\Router($_SERVER['REQUEST_URI']);

$route->get('/', function () {
    echo "Home page";
});
$route->get('/posts', function () {
    echo "Tous les articles";
});
$route->get('/posts/:id', function ($id) {
    echo "L'ariticle " . $id;
});

?>
<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" value="Envoyer">
</form>
<?php
$route->post('/posts/salut-les-8', function () {
    echo "Tous les articles";
});

$route->run();
