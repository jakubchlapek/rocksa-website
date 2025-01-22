<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_HomepageCest
{
    public function test(AcceptanceTester $I): void
    {
        // test for the homepage
        $I->wantTo('see homepage');

        $I->amOnPage('/');

        // $I->see('Better than women, these rocks smash for free', 'div');
        //// check for login and register
        $I->see('Login', 'a#login');

        $I->see('Register', 'a#register');


    }
}
