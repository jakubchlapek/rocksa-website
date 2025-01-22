<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_DashboardCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see a dashboard page');

        $I->amOnPage('/dashboard');

        $I->logIn();

        // test for rocks categories listings
        $I->see("Elements");
        $I->see("Sulfides");
        $I->see("Halides");
        $I->see("Oxides");
        $I->see("Carbonates");
        $I->see("Borates");
        $I->see("Sulfates");

        // test for filtering rocks by category
        $I->waitForNextPage(fn () => $I->click('Halides'));
        $I->seeCurrentUrlEquals('/categories/halides');
        $I->see('Halides');
        // $I->click('Native Metals');
        $I->see('Halite');
        $I->see('Fluorite');

        // test for cart
        $I->click('//button[@alt="toggleCartButton"]');
        // $I->waitForNextPage(fn () => $I->click('//button[@alt="toggleCartButton"]'));
        $I->wait(1);
        $I->see('Your cart is empty.');
        // $I->waitForNextPage(fn () => $I->click('//button[@alt="closeCartButton"]'));
        // $I->wait(1);
        $I->click('//button[@alt="closeCartButton"]');
        $I->wait(1);
        $I->click('(//button[@alt="addremoveCartButton"])[1]');
        $I->click('(//button[@alt="addremoveCartButton"])[2]');
        $I->wait(1);
        $I->click('//button[@alt="toggleCartButton"]');
        $I->wait(1);
        $I->see('Total: $20');
        $I->click('//button[@alt="increaseQuantityButton"]');
        $I->wait(1);
        $I->see('Total: $25');
        $I->click('(//button[@alt="removeFromCartButton"])[2]');
        $I->wait(1);
        $I->see('Total: $10');
        $I->click('//button[@alt="checkoutButton"]');

        // orders test
        // $I->wantTo('have orders page');

        // $I->amOnPage('/orders/create');

        // $I->logIn();
        $I->wait(1);
        $I->seeCurrentUrlEquals('/orders/create');

        $I->see("Halite");

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeCurrentUrlEquals('/orders/create');

        $I->see('The first name field is required.');
        $I->see('The last name field is required.');
        $I->see('The email field is required.');
        $I->see('The phone number field is required.');
        $I->see('The street field is required.');
        $I->see('The city field is required.');
        $I->see('The postal code field is required.');

        $firstName = "TestName";
        $lastName = "TestLastName";
        $testEmail = "test@user.com";
        $testPhone = "123456789";
        $testStreet = "Czarnowiejska";
        $testCity = "Cracow";
        $testPostalCode = "32-600";

        $I->fillField('first_name', $firstName);
        $I->fillField('last_name', $lastName);
        $I->fillField('email', $testEmail);
        $I->fillField('phone_number', $testPhone);
        $I->fillField('street', $testStreet);
        $I->fillField('city', $testCity);
        $I->fillField('postal_code', $testPostalCode);

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeInDatabase('orders', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $testEmail,
            'phone_number' => $testPhone,
            'street' => $testStreet,
            'city' => $testCity,
            'postal_code' => $testPostalCode
        ]);
        /*
        /** @var string $id */
        /*
        $id = $I->grabFromDatabase('orders', 'id', [
        'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $testEmail,
            'phone_number' => $testPhone,
            'street' => $testStreet,
            'city' => $testCity,
            'postal_code' => $testPostalCode
            ]);

        $I->seeCurrentUrlEquals('/orders/' . $id);
        $I->see($firstName);
        $I->see($lastName);
        $I->see($testEmail);
        // $I->see($I);
        */
    }
}
