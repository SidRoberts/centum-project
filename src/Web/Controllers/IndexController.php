<?php

namespace App\Web\Controllers;

use Centum\Http\Response;
use Twig\Environment;

final class IndexController
{
    public function index(Environment $twig): Response
    {
        return new Response(
            $twig->render("index/index.twig")
        );
    }
}
