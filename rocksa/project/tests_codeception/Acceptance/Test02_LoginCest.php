<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_LoginCest
{
    public function test(AcceptanceTester $I): void
    {
        // test for login as a test user
        $I->wantTo('register with a new user');

        $I->amOnPage('/dashboard');

        $I->logIn();

        $I->seeCurrentUrlEquals('/dashboard');
        // test for the username
        $I->see('test');
        // $I->see("You're logged in!");
    }
}
