<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_HomepageCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see Laravel links on homepage');

        $I->amOnPage('/');

        $I->seeInTitle('Laravel');

        $I->seeLink("Documentation", "https://laravel.com/docs");
        $I->seeLink("Laracasts", "https://laracasts.com");
        $I->seeLink("Forge", "https://forge.laravel.com");
    }
}
