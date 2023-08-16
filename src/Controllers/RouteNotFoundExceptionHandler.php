<?php

namespace App\Controllers;

use Centum\Http\Response;
use Centum\Http\Status;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\ResponseInterface;
use Centum\Interfaces\Router\ExceptionHandlerInterface;
use Centum\Router\Exception\RouteNotFoundException;
use Centum\Router\Exception\UnsuitableExceptionHandlerException;
use Throwable;
use Twig\Environment;

final class RouteNotFoundExceptionHandler implements ExceptionHandlerInterface
{
    public function __construct(
        protected readonly Environment $twig
    ) {
    }

    public function handle(RequestInterface $request, Throwable $throwable): ResponseInterface
    {
        if (!($throwable instanceof RouteNotFoundException)) {
            throw new UnsuitableExceptionHandlerException();
        }

        return new Response(
            $this->twig->render(
                "error/404.twig",
                [
                    "uri" => $request->getUri(),
                ]
            ),
            Status::NOT_FOUND
        );
    }
}
