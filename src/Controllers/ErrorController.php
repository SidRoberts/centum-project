<?php

namespace App\Controllers;

use Centum\Http\Response;
use Centum\Http\Status;
use Centum\Interfaces\Http\RequestInterface;
use Centum\Interfaces\Http\ResponseInterface;
use Centum\Interfaces\Router\ControllerInterface;
use Twig\Environment;

final class ErrorController implements ControllerInterface
{
    public function error403(Environment $twig, RequestInterface $request): ResponseInterface
    {
        return new Response(
            $twig->render(
                "error/403.twig",
                [
                    "uri" => $request->getUri(),
                ]
            ),
            Status::FORBIDDEN
        );
    }

    public function error404(Environment $twig, RequestInterface $request): ResponseInterface
    {
        return new Response(
            $twig->render(
                "error/404.twig",
                [
                    "uri" => $request->getUri(),
                ]
            ),
            Status::NOT_FOUND
        );
    }

    public function error500(Environment $twig, RequestInterface $request): ResponseInterface
    {
        return new Response(
            $twig->render(
                "error/500.twig",
                [
                    "uri" => $request->getUri(),
                ]
            ),
            Status::INTERNAL_SERVER_ERROR
        );
    }
}
