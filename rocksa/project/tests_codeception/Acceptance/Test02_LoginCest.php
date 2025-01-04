<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_LoginCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('login with existing user');

        $I->amOnPage('/dashboard');

        $I->logIn();

        $I->seeCurrentUrlEquals('/dashboard');

        $I->see('John Doe');
        $I->see("You're logged in!");
    }
}
