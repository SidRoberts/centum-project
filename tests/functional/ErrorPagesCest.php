<?php

namespace Tests;

class ErrorPagesCest
{
    public function pageForbidden(FunctionalTester $I)
    {
        $I->amOnPage("/error/403");

        $I->seeResponseCodeIs(403);
    }

    public function pageNotFound(FunctionalTester $I)
    {
        $I->amOnPage("/a/page/that/doesnt/exist");

        $I->seeResponseCodeIs(404);
    }

    public function internalServerError(FunctionalTester $I)
    {
        $I->amOnPage("/error/500");

        $I->seeResponseCodeIs(500);
    }
}
