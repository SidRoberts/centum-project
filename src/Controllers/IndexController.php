<?php

namespace App\Controllers;

use Centum\Http\Response;
use Centum\Interfaces\Http\ResponseInterface;
use Twig\Environment;

final class IndexController
{
    public function index(Environment $twig): ResponseInterface
    {
        return new Response(
            $twig->render("index/index.twig")
        );
    }
}
