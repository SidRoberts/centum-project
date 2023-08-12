<?php

namespace App\Commands;

use Centum\Console\CommandMetadata;
use Centum\Interfaces\Console\CommandInterface;
use Centum\Interfaces\Console\TerminalInterface;

#[CommandMetadata("")]
class MainCommand implements CommandInterface
{
    public function execute(TerminalInterface $terminal): int
    {
        $terminal->writeLine("Hello.");

        return self::SUCCESS;
    }
}
