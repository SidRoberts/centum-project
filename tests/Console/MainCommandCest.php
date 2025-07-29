<?php

namespace Tests\Console;

use App\Console\Commands\MainCommand;
use Tests\Support\ConsoleTester;

final class MainCommandCest
{
    public function testGetName(ConsoleTester $I): void
    {
        $metadata = $I->grabCommandMetadata(MainCommand::class);

        $I->assertEquals(
            "",
            $metadata->getName()
        );
    }

    public function testGetDescription(ConsoleTester $I): void
    {
        $metadata = $I->grabCommandMetadata(MainCommand::class);

        $I->assertEquals(
            "",
            $metadata->getDescription()
        );
    }



    public function testExecute(ConsoleTester $I): void
    {
        $I->addCommand(MainCommand::class);

        $I->runCommand(
            [
                "cli.php",
                "",
            ]
        );

        $I->seeExitCodeIs(0);

        $I->seeStdoutEquals(
            "Hello.\n"
        );
    }
}
