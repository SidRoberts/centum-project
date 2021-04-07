<?php

require __DIR__ . "/../vendor/autoload.php";

use Centum\Boot\WebBootstrap;

$container = require __DIR__ . "/../config/container.php";

$bootstrap = new WebBootstrap();

$bootstrap->boot($container);
