<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_BooksCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('have books page');

        $I->amOnPage('/books');

        $I->logIn();

        $I->seeCurrentUrlEquals('/books');

        $I->see('List of books', 'h2');

        $I->see('There are no books in the database.');

        $I->waitForNextPage(fn () => $I->click('Create new book'));

        $I->seeCurrentUrlEquals('/books/create');

        $I->see('Creating new book', 'h2');

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeCurrentUrlEquals('/books/create');

        $I->see('The isbn field is required.');
        $I->see('The title field is required.');
        $I->see('The description field is required.');

        $bookIsbn = "1234512345123";
        $bookTitle = "SomeTitle";
        $bookDescriptionIntro = "SomeDescription with";
        $bookDescriptionFormatted = "formatting";
        $bookDescription = "$bookDescriptionIntro **$bookDescriptionFormatted**";

        $I->fillField('isbn', 'string');
        $I->fillField('title', $bookTitle);
        $I->fillField('description', $bookDescription);

        $I->waitForNextPage(fn () => $I->click('Create'));
        $I->seeCurrentUrlEquals('/books/create');

        $I->see('The isbn field must be 13 digits.');
        $I->dontSee('The name title is required.');
        $I->dontSee('The surname description is required.');

        $I->fillField('isbn', $bookIsbn);


        $I->dontSeeInDatabase('books', [
            'isbn' => $bookIsbn,
            'title' => $bookTitle,
            'description' => $bookDescription
        ]);

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->seeInDatabase('books', [
            'isbn' => $bookIsbn,
            'title' => $bookTitle,
            'description' => $bookDescription
        ]);

        /** @var string $id */
        $id = $I->grabFromDatabase('books', 'id', [
            'isbn' => $bookIsbn
        ]);

        $I->seeCurrentUrlEquals('/books/' . $id);

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
    }
}
