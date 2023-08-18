<?php

namespace App\Web\Controllers;

use App\Web\ExceptionHandlers\ExceptionHandler;
use App\Web\ExceptionHandlers\RouteNotFoundExceptionHandler;
use Centum\Interfaces\Container\ContainerInterface;
use Centum\Router\Router;

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



////////////////////////////////////////////////////////////////////////////////
//                             EXCEPTION HANDLERS                             //
////////////////////////////////////////////////////////////////////////////////

$router->addExceptionHandler(RouteNotFoundExceptionHandler::class);

$router->addExceptionHandler(ExceptionHandler::class);



////////////////////////////////////////////////////////////////////////////////
//                                 AND RETURN                                 //
////////////////////////////////////////////////////////////////////////////////

return $router;
