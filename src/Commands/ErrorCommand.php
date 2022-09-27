<?php

namespace App\Commands;

use Centum\Console\Command;
use Centum\Interfaces\Console\ParametersInterface;
use Centum\Interfaces\Console\TerminalInterface;
use Centum\Interfaces\Container\ContainerInterface;

class ErrorCommand extends Command
{
    public function getName(): string
    {
        return "error";
    }

    public function execute(TerminalInterface $terminal, ContainerInterface $container, ParametersInterface $parameters): int
    {
        $terminal->writeLine("Something went wrong. :(");

        return 1;
    }
}
