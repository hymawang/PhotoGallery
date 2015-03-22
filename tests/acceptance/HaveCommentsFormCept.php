<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see add comments form');
$I->amOnPage("/");
$I->see("page-header");
$I->click("a.thumbnail");
$I->seeInCurrentUrl("view");
$I->see("<h2>Add a comment</h2>");
