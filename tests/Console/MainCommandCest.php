<?php

namespace Tests\Console;

use App\Commands\MainCommand;
use Tests\Support\ConsoleTester;

class MainCommandCest
{
    public function testGetName(ConsoleTester $I): void
    {
        $command = new MainCommand();

        $I->assertEquals(
            "",
            $command->getName()
        );
    }

    public function testGetDescription(ConsoleTester $I): void
    {
        $command = new MainCommand();

        $I->assertEquals(
            "",
            $command->getDescription()
        );
    }

    public function testGetHelp(ConsoleTester $I): void
    {
        $command = new MainCommand();

        $I->assertEquals(
            "",
            $command->getHelp()
        );
    }



    public function testExecute(ConsoleTester $I): void
    {
        $I->addCommand(
            new MainCommand()
        );

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
