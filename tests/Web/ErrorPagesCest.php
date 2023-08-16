<?php

namespace Tests\Web;

use Tests\Support\WebTester;

class ErrorPagesCest
{
    public function pageNotFound(WebTester $I): void
    {
        $I->amOnPage("/a/page/that/doesnt/exist");

        $I->seeResponseCodeIs(404);
    }
}
