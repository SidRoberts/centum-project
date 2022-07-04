<?php

namespace App\Commands;

use Centum\Console\Command;
use Centum\Console\Parameters;
use Centum\Console\Terminal;
use Centum\Container\Container;

class MainCommand extends Command
{
    public function getName(): string
    {
        return "";
    }

    public function execute(Terminal $terminal, Container $container, Parameters $parameters): int
    {
        $terminal->writeLine("Hello.");

        return 0;
    }
}
