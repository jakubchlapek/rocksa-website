<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test05_OrdersCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('have orders page');

        $I->amOnPage('/orders');

        $I->logIn();

        $I->seeCurrentUrlEquals('/orders');

        $I->see('There are no orders in the database.');

        $I->waitForNextPage(fn () => $I->click('Create new order'));

        $I->seeCurrentUrlEquals('/orders/create');

        $I->see('Create a new order!', 'h1');

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeCurrentUrlEquals('/orders/create');

        $I->see('The first name field is required.');
        $I->see('The last name field is required.');
        $I->see('The email field is required.');
        $I->see('The phone number field is required.');
        $I->see('The street field is required.');

        $firstName = 'John';
        $lastName = 'Doe';
        $email = 'johndoe@example.com';
        $phoneNumber = 123456789;
        $street = 'Czarnowiejska';
        $city = 'Krakow';
        $postalCode = '32-600';

        $I->fillField('first_name', $firstName);
        $I->fillField('last_name', $lastName);
        $I->fillField('email', $email);
        $I->fillField('phone_number', $phoneNumber);
        $I->fillField('street', $street);
        $I->fillField('city', $city);
        $I->fillField('postal_code', $postalCode);

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeInDatabase('orders', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'street' => $street,
            'city' => $city,
            'postal_code' => $postalCode,
        ]);

        $I->waitForNextPage(fn () => $I->click('Delete'));
        $I->see('There are no orders in the database.');


        $I->dontSeeInDatabase('orders', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'street' => $street,
            'city' => $city,
            'postal_code' => $postalCode,
        ]);
    }
}
