<?php

namespace App\Commands;

use Centum\Console\Command;
use Centum\Console\CommandMetadata;
use Centum\Interfaces\Console\ParametersInterface;
use Centum\Interfaces\Console\TerminalInterface;

#[CommandMetadata("")]
class MainCommand extends Command
{
    public function execute(TerminalInterface $terminal, ParametersInterface $parameters): int
    {
        $terminal->writeLine("Hello.");

        return self::SUCCESS;
    }
}
