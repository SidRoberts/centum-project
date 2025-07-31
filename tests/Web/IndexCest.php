<?php

namespace Tests\Web;

use Tests\Support\WebTester;

final class IndexCest
{
    public function tryToTest(WebTester $I): void
    {
        $I->amOnPage("/");

        $I->seeResponseCodeIs(200);

        $I->see("This is where it all begins...");
    }
}
