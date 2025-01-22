<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test06_CartCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('add rocks to the cart');

        $I->amOnPage('/dashboard');

        $I->logIn();

        $I->seeCurrentUrlEquals('/dashboard');

        $I->see('Listings');

        $I->click("#add-to-cart-button");
    }
}
