<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_RocksCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('have rocks page');

        $I->amOnPage('/rocks');

        $I->logIn();

        $I->seeCurrentUrlEquals('/rocks');

        // $I->see('List of books', 'h2');

        $I->see('There are no rocks in the database.');

        $I->waitForNextPage(fn () => $I->click('Create new rock'));

        $I->seeCurrentUrlEquals('/rocks/create');

        $I->see('Create a rock!', 'h1');

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeCurrentUrlEquals('/rocks/create');

        $I->see('The title field is required.');
        $I->see('The main mineral field is required.');
        $I->see('The description field is required.');
        $I->see('The weight field is required.');


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
        // $bookDescriptionIntro = "SomeDescription with";
        // $bookDescriptionFormatted = "formatting";
        // $bookDescription = "$bookDescriptionIntro **$bookDescriptionFormatted**";

        // $I->fillField('isbn', 'string');
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

        // $I->waitForNextPage(fn () => $I->click('Create'));
        // $I->seeCurrentUrlEquals('/books/create');

        // $I->see('The isbn field must be 13 digits.');
        // $I->dontSee('The name title is required.');
        // $I->dontSee('The surname description is required.');

        // $I->fillField('isbn', $bookIsbn);

        /*
        $I->dontSeeInDatabase('books', [
            'isbn' => $bookIsbn,
            'title' => $bookTitle,
            'description' => $bookDescription
        ]);
        */
        $I->waitForNextPage(fn () => $I->click('Create'));

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

        $I->waitForNextPage(fn () => $I->click('Delete'));
        $I->see('There are no rocks in the database.');

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
            'description' => $rockDescription
        ]);

        /*
        /** @var string $id */
        /*
        $id = $I->grabFromDatabase('books', 'id', [
            'isbn' => $bookIsbn
        ]);
        */
        // $I->seeCurrentUrlEquals('/books/' . $id);

        /*
        $I->see("Viewing a book", 'h2');
        $I->see($bookIsbn);
        $I->see($bookTitle);
        $I->see($bookDescriptionIntro);
        $I->see($bookDescriptionFormatted, 'strong');

        $I->amOnPage('/books');

        $I->see("$bookIsbn", 'tr > td');
        $I->see("$bookTitle", 'tr > td');
        $I->dontSee("$bookDescription", 'tr > td');

        $I->waitForNextPage(fn () => $I->click('Details'));

        $I->seeCurrentUrlEquals('/books/' . $id);

        $I->waitForNextPage(fn () => $I->click('Edit'));

        $I->seeCurrentUrlEquals('/books/' . $id . '/edit');
        $I->see('Editing a book', 'h2');

        $I->seeInField('isbn', $bookIsbn);
        $I->seeInField('title', $bookTitle);
        $I->seeInField('description', $bookDescription);

        $I->fillField('description', "");

        $I->waitForNextPage(fn () => $I->click('Update'));

        $I->seeCurrentUrlEquals('/books/' . $id . '/edit');
        $I->see('The description field is required.', 'li');

        $bookNewDescription = 'NewBookDescription';

        $I->fillField('description', $bookNewDescription);
        $I->waitForNextPage(fn () => $I->click('Update'));

        $I->seeCurrentUrlEquals('/books/' . $id);

        $I->see($bookNewDescription);

        $I->dontSeeInDatabase('books', [
            'isbn' => $bookIsbn,
            'description' => $bookDescription
        ]);

        $I->seeInDatabase('books', [
            'isbn' => $bookIsbn,
            'description' => $bookNewDescription
        ]);

        $I->waitForNextPage(fn () => $I->click('Delete'));

        $I->seeCurrentUrlEquals('/books');

        $I->dontSeeInDatabase('books', [
            'isbn' => $bookIsbn,
            'description' => $bookNewDescription
        ]);
        */
    }
}
