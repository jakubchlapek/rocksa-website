<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_DashboardOrdersCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see a dashboard page');

        $I->amOnPage('/dashboard');

        $I->logIn();

        $I->see("Elements");
        $I->see("Sulfides");
        $I->see("Halides");
        $I->see("Oxides");
        $I->see("Carbonates");
        $I->see("Borates");
        $I->see("Sulfates");

        $I->waitForNextPage(fn () => $I->click('Halides'));
        $I->seeCurrentUrlEquals('/categories/halides');
        $I->see('Halides');
        $I->see('Halite');
        $I->see('Fluorite');

        // test for cart
        $I->click('//button[@alt="toggleCartButton"]');
        $I->wait(1);
        $I->see('Your cart is empty.');
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
        $I->see($testCity);
        $I->see($testEmail);
        $I->see($testStreet);
        $I->see($testPhone);
        $I->see('Total: $10.00');
        $I->see($testPostalCode);

        $I->amOnPage('/orders/');

        $I->see("$firstName", 'tr > td');
        $I->see("$lastName", 'tr > td');
        $I->see("$testCity", 'tr > td');
        $I->see("$testStreet", 'tr > td');
        $I->see("$testPostalCode", 'tr > td');
        $I->see("$testEmail", 'tr > td');
        $I->see("$testPhone", 'tr > td');

        $I->maximizeWindow();

        $I->waitForNextPage(fn () => $I->click('Details'));

        $I->seeCurrentUrlEquals('/orders/' . $id);

        $I->waitForNextPage(fn () => $I->click('Delete'));

        $I->dontSeeInDatabase('orders', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $testEmail,
            'phone_number' => $testPhone,
            'street' => $testStreet,
            'city' => $testCity,
            'postal_code' => $testPostalCode
        ]);


    }
}
