<?php

namespace App\Controllers;

use Centum\Interfaces\Container\ContainerInterface;
use Centum\Router\Exception\RouteNotFoundException;
use Centum\Router\Router;
use Throwable;

////////////////////////////////////////////////////////////////////////////////
//                                   ROUTER                                   //
////////////////////////////////////////////////////////////////////////////////

/**
 * @psalm-suppress UnnecessaryVarAnnotation
 * @var ContainerInterface $container
 */
$router = new Router($container);



////////////////////////////////////////////////////////////////////////////////
//                                   ROUTES                                   //
////////////////////////////////////////////////////////////////////////////////

$group = $router->group();

$group->get("/", IndexController::class, "index");

$group->get("/error/403", ErrorController::class, "error403");
$group->get("/error/404", ErrorController::class, "error404");
$group->get("/error/500", ErrorController::class, "error500");



////////////////////////////////////////////////////////////////////////////////
//                             EXCEPTION HANDLERS                             //
////////////////////////////////////////////////////////////////////////////////

$router->addExceptionHandler(
    RouteNotFoundException::class,
    ErrorController::class,
    "error404"
);

$router->addExceptionHandler(
    Throwable::class,
    ErrorController::class,
    "error500"
);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $router;
