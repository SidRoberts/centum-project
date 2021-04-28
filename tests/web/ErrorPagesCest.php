<?php

namespace Tests\Web;

use Tests\WebTester;

class ErrorPagesCest
{
    public function pageForbidden(WebTester $I)
    {
        $I->amOnPage("/error/403");

        $I->seeResponseCodeIs(403);
    }

    public function pageNotFound(WebTester $I)
    {
        $I->amOnPage("/a/page/that/doesnt/exist");

        $I->seeResponseCodeIs(404);
    }

    public function internalServerError(WebTester $I)
    {
        $I->amOnPage("/error/500");

        $I->seeResponseCodeIs(500);
    }
}
