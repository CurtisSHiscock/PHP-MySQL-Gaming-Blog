<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
require 'config.php';

$app = new \Slim\App(['settings' => $config]);
$container = $app->getContainer();

$container['db'] = function ($c) {
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
    if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    return $conn;
};

$container['view'] = new PhpRenderer("modules/core");

$app->any('/', function (Request $request, Response $response, array $args) {
    $conn = $this->db;
	return $this->view->render($response, "/core.phtml", ['conn' => $conn]);
});
$app->get('/classes', function (Request $request, Response $response){
    $conn = $this->db;
	return $this->view->render($response, "/classes.phtml", ['conn' => $conn]);
});
// $app->get('/classes/{Barbarian}', function (Request $request, Response $response){
//     $conn = $this->db;
// 	return $this->view->render($response, "/barbarian.phtml", ['conn' => $conn, 'class' => 'Barbarian']);
// });
$app->get('/classes/{class}', function (Request $request, Response $response, array $args){
    $conn = $this->db;
    $class = $args['class']; //Note: Must escape this before hosting
    $query = "SELECT name FROM classes where name='$class'";
    $result = mysqli_query($conn, $query);
    $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $count = count($classes);
    if($count > 0){
        return $this->view->render($response, "/class.phtml", ['conn' => $conn, 'class'=> $class]);
    } else{
        return $this->view->render($response, "/missing.phtml", ['conn' => $conn]);
    }
});
$app->get('/races', function (Request $request, Response $response){
    $conn = $this->db;
    return $this->view->render($response, "/races.phtml", ['conn' => $conn]);
});
$app->get('/magic_items', function (Request $request, Response $response){
    $conn = $this->db;
    return $this->view->render($response, "/magic_items.phtml", ['conn' => $conn]);
});

$app->run();
?>