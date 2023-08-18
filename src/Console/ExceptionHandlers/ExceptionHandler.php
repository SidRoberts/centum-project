<?php

namespace App\Console\ExceptionHandlers;

use Centum\Interfaces\Console\ExceptionHandlerInterface;
use Centum\Interfaces\Console\TerminalInterface;
use Throwable;

final class ExceptionHandler implements ExceptionHandlerInterface
{
    public function handle(TerminalInterface $terminal, Throwable $throwable): void
    {
        $terminal->writeLine("Something went wrong. :(");
    }
}
