<?php

namespace App\Web\ExceptionHandlers;

use Centum\Http\Response;
use Centum\Http\Status;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\ResponseInterface;
use Centum\Interfaces\Router\ExceptionHandlerInterface;
use Throwable;
use Twig\Environment;

final class ExceptionHandler implements ExceptionHandlerInterface
{
    public function __construct(
        protected readonly Environment $twig
    ) {
    }

    public function handle(RequestInterface $request, Throwable $throwable): ResponseInterface
    {
        return new Response(
            $this->twig->render(
                "error/500.twig",
                [
                    "uri" => $request->getUri(),
                ]
            ),
            Status::INTERNAL_SERVER_ERROR
        );
    }
}
