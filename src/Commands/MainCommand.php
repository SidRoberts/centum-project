<?php

namespace App\Commands;

use Centum\Console\Command;
use Centum\Interfaces\Console\ParametersInterface;
use Centum\Interfaces\Console\TerminalInterface;
use Centum\Interfaces\Container\ContainerInterface;

class MainCommand extends Command
{
    public function getName(): string
    {
        return "";
    }

    public function execute(TerminalInterface $terminal, ContainerInterface $container, ParametersInterface $parameters): int
    {
        $terminal->writeLine("Hello.");

        return 0;
    }
}
