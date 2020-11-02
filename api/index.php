<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

$app = AppFactory::create();
$app->setBasePath('/ferreteriav3/api');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world! antonio");
    return $response;
});

$app->get('/users', function (Request $request, Response $response, $args) {
    $users = Capsule::table('categorias')->get();
    $response->getBody()->write(print_r($users, true));
    return $response;
});

$app->run();