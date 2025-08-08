<?php

namespace App\Console\Commands;

use Centum\Console\CommandMetadata;
use Centum\Interfaces\Console\CommandInterface;
use Centum\Interfaces\Console\TerminalInterface;
use Centum\Interfaces\Translation\TranslatorInterface;

#[CommandMetadata("")]
final class MainCommand implements CommandInterface
{
    public function __construct(
        protected readonly TranslatorInterface $translator
    ) {
    }



    public function execute(TerminalInterface $terminal): int
    {
        $terminal->writeLine(
            $this->translator->translate("console/main", "greeting")
        );

        return self::SUCCESS;
    }
}
