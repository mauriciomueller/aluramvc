<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\Error404;
use Alura\Cursos\Middleware\Route;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

$caminho = strtok($_SERVER["REQUEST_URI"], '?');

require __DIR__ . '/../config/routes.php';

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UpdaloadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();

$rotas = Route::getAll();
session_start();

if (!array_key_exists($caminho, Route::getAll())) {
    $controlador = new Error404();
    $resposta = $controlador->handle($request);
} else {
    if (array_key_exists($caminho, Route::$PROTECTED) && is_null($_SESSION['logado']) || $_SESSION['logado'] === false) {
        header('Location: /login', true);
    }

    $classeControladora = $rotas[$caminho];

    /** @var ContainerInterface $container */
    $container = require __DIR__ . '/../config/dependencias.php';

    /** @var RequestHandlerInterface $controlador */
    $controlador = $container->get($classeControladora);

    $resposta = $controlador->handle($request);
}

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();