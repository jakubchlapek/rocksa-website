<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_RocksCest
{
    public function test(AcceptanceTester $I): void
    {
        // test for rocks page
        $I->wantTo('have rocks page');

        $I->amOnPage('/rocks');

        $I->logIn();

        $I->seeCurrentUrlEquals('/rocks');


        // test for an opportunity to create a new rock
        $I->waitForNextPage(fn () => $I->click('Create new rock'));

        // $I->seeCurrentUrlMatches('/rocks/create');
        $I->seeInCurrentUrl('/rocks/create');
        // $I->seeCurrentUrlEquals('/rocks/create');

        $I->see('Create a rock!', 'h1');

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeCurrentUrlEquals('/rocks/create');
        // test for required fields
        $I->see('The title field is required.');
        $I->see('The main mineral field is required.');
        $I->see('The description field is required.');
        $I->see('The weight field is required.');

        // try to add a valid rock
        $rockTitle = "SomeTitle";
        $mainMineral = "MainMineral";
        $weight = 0.75;
        $density = 3.51;
        $rarity = "Rare";
        $price = 5000.00;
        $treatment = "None";
        $countryOfOrigin = "Brazil";
        $color = "Blue";
        $clarity = "Flawless";
        $toughness = 10;
        $rockDescription = "Ultra cool diamond straight from Brazil";


        $I->fillField('title', $rockTitle);
        $I->fillField('Main Mineral', $mainMineral);
        $I->fillField('Weight', $weight);
        $I->fillField('Density', $density);
        $I->fillField('Rarity', $rarity);
        $I->fillField('Price', $price);
        $I->fillField('Treatment', $treatment);
        $I->fillField('country_of_origin', $countryOfOrigin);
        $I->fillField('Color', $color);
        $I->fillField('Clarity', $clarity);
        $I->fillField('Toughness', $toughness);
        $I->fillField('description', $rockDescription);
        $I->selectOption('#category_id', '1');
        // try to add the rock
        $I->waitForNextPage(fn () => $I->click('Create'));
        // look for the rock in the database
        $I->seeInDatabase('rocks', [
            'title' => $rockTitle,
            'weight' => $weight,
            'density' => $density,
            'rarity' => $rarity,
            'price' => $price,
            'treatment' => $treatment,
            'country_of_origin' => $countryOfOrigin,
            'color' => $color,
            'clarity' => $clarity,
            'toughness' => $toughness,
            'main_mineral' => $mainMineral,
            'description' => $rockDescription
        ]);


        /*
        /** @var string $id */
        // grab the rock id from the database
        $id = $I->grabFromDatabase('rocks', 'id', [
            'title' => $rockTitle,
            'weight' => $weight,
            'density' => $density,
            'rarity' => $rarity,
            'price' => $price,
            'treatment' => $treatment,
            'country_of_origin' => $countryOfOrigin,
            'color' => $color,
            'clarity' => $clarity,
            'toughness' => $toughness,
            'main_mineral' => $mainMineral,
            'description' => $rockDescription
        ]);
        // test for the rock page
        $I->seeCurrentUrlEquals('/rocks/' . $id);
        $I->see($rockTitle);
        $I->see($mainMineral);
        $I->see($treatment);
        $I->see((string)$weight);
        $I->see((string)$density);
        $I->see($color);
        $I->see($clarity);
        $I->see((string)$toughness);
        $I->see($rarity);
        $I->see($rockDescription);
        $I->see($countryOfOrigin);


        $I->amOnPage('/rocks');


        $I->see("$rockTitle", 'tr > td');
        $I->see("$mainMineral", 'tr > td');
        $I->see("$treatment", 'tr > td');
        $I->see("$weight", 'tr > td');
        $I->see("$rarity", 'tr > td');
        $I->see("$price", 'tr > td');
        $I->dontSee("$rockDescription", 'tr > td');

        $I->waitForNextPage(fn () => $I->click('Details'));

        $I->seeCurrentUrlEquals('/rocks/' . $id);

        $I->waitForNextPage(fn () => $I->click('Edit'));

        $I->seeCurrentUrlEquals('/rocks/' . $id . '/edit');

        $I->seeInField('title', $rockTitle);
        $I->seeInField('main_mineral', $mainMineral);
        $I->seeInField('weight', (string)$weight);
        $I->seeInField('density', (string)$density);
        $I->seeInField('rarity', $rarity);
        $I->seeInField('price', (string)$price);
        $I->seeInField('treatment', $treatment);
        $I->seeInField('country_of_origin', $countryOfOrigin);
        $I->seeInField('color', $color);
        $I->seeInField('clarity', $clarity);
        $I->seeInField('toughness', (string)$toughness);
        $I->seeInField('description', $rockDescription);

        $I->fillField('description', "");

        $I->waitForNextPage(fn () => $I->click(' Update '));

        $I->seeCurrentUrlEquals('/rocks/' . $id . '/edit');
        $I->see('The description field is required.', 'li');

        $rockNewDescription = 'NewRockDescription';

        $I->fillField('description', $rockNewDescription);
        $I->waitForNextPage(fn () => $I->click(' Update '));

        $I->seeCurrentUrlEquals('/rocks/' . $id);

        $I->see($rockNewDescription);

        $I->dontSeeInDatabase('rocks', [
            'description' => $rockDescription
        ]);

        $I->seeInDatabase('rocks', [
            'description' => $rockNewDescription
        ]);

        $I->waitForNextPage(fn () => $I->click('Delete'));


        $I->dontSeeInDatabase('rocks', [
            'title' => $rockTitle,
            'weight' => $weight,
            'density' => $density,
            'rarity' => $rarity,
            'price' => $price,
            'treatment' => $treatment,
            'country_of_origin' => $countryOfOrigin,
            'color' => $color,
            'clarity' => $clarity,
            'toughness' => $toughness,
            'main_mineral' => $mainMineral,
            'description' => $rockNewDescription
        ]);

    }
}
