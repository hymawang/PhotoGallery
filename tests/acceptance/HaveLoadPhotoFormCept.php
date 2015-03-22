<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Click "Load Photo", login and see load photo form');
$I->amOnPage("/");
$I->see("page-header");
$I->see('Load photo');
$I->click("Load photo");
$I->seeInCurrentUrl("login");
$I->see('Please fill out the following fields to login');
$I->fillField('Login', '1@cept.cept');
$I->fillField('Password', 'testtest');
$I->click("form button[type=submit]");
$I->dontSee("Incorrect email or password.");
$I->see("<h1>Load photo</h1>");