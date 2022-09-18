<?php

namespace Tests\Web;

use Tests\Support\WebTester;

class IndexCest
{
    public function tryToTest(WebTester $I): void
    {
        $I->amOnPage("/");

        $I->seeResponseCodeIs(200);

        $I->see("Sid Roberts");
    }
}
