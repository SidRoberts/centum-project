<?php

require __DIR__ . "/../vendor/autoload.php";

use Centum\App\WebBootstrap;

$container = require __DIR__ . "/../config/container.php";

$bootstrap = $container->get(WebBootstrap::class);

$bootstrap->boot($container);
