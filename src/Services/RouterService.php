<?php

namespace App\Services;

use App\Web\Controllers\IndexController;
use App\Web\ExceptionHandlers\ExceptionHandler;
use App\Web\ExceptionHandlers\RouteNotFoundExceptionHandler;
use Centum\Interfaces\Container\ContainerInterface;
use Centum\Interfaces\Container\ServiceInterface;
use Centum\Interfaces\Router\RouterInterface;
use Centum\Router\Router;

/**
 * @implements ServiceInterface<RouterInterface>
 */
final class RouterService implements ServiceInterface
{
    public function __construct(
        protected readonly ContainerInterface $container
    ) {
    }

    public function build(): RouterInterface
    {
        ////////////////////////////////////////////////////////////////////////
        //                               ROUTER                               //
        ////////////////////////////////////////////////////////////////////////

        $router = new Router($this->container);



        ////////////////////////////////////////////////////////////////////////
        //                               ROUTES                               //
        ////////////////////////////////////////////////////////////////////////

        $group = $router->group();

        $group->get("/", IndexController::class, "index");



        ////////////////////////////////////////////////////////////////////////
        //                         EXCEPTION HANDLERS                         //
        ////////////////////////////////////////////////////////////////////////

        $router->addExceptionHandler(RouteNotFoundExceptionHandler::class);

        $router->addExceptionHandler(ExceptionHandler::class);



        ////////////////////////////////////////////////////////////////////////
        //                             AND RETURN                             //
        ////////////////////////////////////////////////////////////////////////

        return $router;

    }
}
