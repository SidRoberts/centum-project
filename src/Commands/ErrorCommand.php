<?php

namespace App\Commands;

use Centum\Console\Command;
use Centum\Interfaces\Console\ParametersInterface;
use Centum\Interfaces\Console\TerminalInterface;

class ErrorCommand extends Command
{
    public function execute(TerminalInterface $terminal, ParametersInterface $parameters): int
    {
        $terminal->writeLine("Something went wrong. :(");

        return self::FAILURE;
    }
}
