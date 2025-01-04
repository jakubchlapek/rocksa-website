<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test01_CommentsCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see comments from DB displayed on page');

        $I->seeNumRecords(0, "comments");

        $randomNumber = rand();

        $title = "Title $randomNumber";
        $text = "Some text $randomNumber with **bold** text";

        $id = $I->haveInDatabase('comments', ['title' => $title, 'text' => $text]);

        $I->amOnPage('/comments');
        $I->see('Comments');
        $I->seeLink($title, "/comments/$id");

        $I->click($title);
        $I->seeCurrentUrlEquals("/comments/$id");

        $I->see($title);
        $textOnPage = str_replace("**bold**", "bold", $text);
        $I->see($textOnPage, 'p');
        $I->see("bold", 'p > strong');
    }
}
