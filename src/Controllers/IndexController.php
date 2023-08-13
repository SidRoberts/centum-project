<?php

namespace App\Controllers;

use Centum\Http\Response;
use Centum\Interfaces\Http\ResponseInterface;
use Centum\Interfaces\Router\ControllerInterface;
use Twig\Environment;

final class IndexController implements ControllerInterface
{
    public function index(Environment $twig): ResponseInterface
    {
        return new Response(
            $twig->render("index/index.twig")
        );
    }
}
