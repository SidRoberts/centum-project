<?php

namespace Tests\Web;

use Tests\Support\WebTester;

class ErrorPagesCest
{
    public function pageForbidden(WebTester $I): void
    {
        $I->amOnPage("/error/403");

        $I->seeResponseCodeIs(403);
    }

    public function pageNotFound(WebTester $I): void
    {
        $I->amOnPage("/a/page/that/doesnt/exist");

        $I->seeResponseCodeIs(404);
    }

    public function internalServerError(WebTester $I): void
    {
        $I->amOnPage("/error/500");

        $I->seeResponseCodeIs(500);
    }
}
