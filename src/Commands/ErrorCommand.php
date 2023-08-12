<?php

namespace App\Commands;

use Centum\Interfaces\Console\CommandInterface;
use Centum\Interfaces\Console\TerminalInterface;

class ErrorCommand implements CommandInterface
{
    public function execute(TerminalInterface $terminal): int
    {
        $terminal->writeLine("Something went wrong. :(");

        return self::FAILURE;
    }
}
