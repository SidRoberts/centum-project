<?php

namespace App\Controllers;

use Centum\Http\Request;
use Centum\Http\Response;
use Centum\Http\Status;
use Twig\Environment;

final class ErrorController
{
    public function error403(Environment $twig, Request $request): Response
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

    public function error404(Environment $twig, Request $request): Response
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

    public function error500(Environment $twig, Request $request): Response
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
