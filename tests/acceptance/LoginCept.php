<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Login');
$I->amOnPage("/");
$I->see("page-header");
$I->see('Login');
$I->click("Login");
$I->seeInCurrentUrl("login");
$I->see('Please fill out the following fields to login');
$I->fillField('Login', '1@cept.cept');
$I->fillField('Password', 'testtest');
$I->click("form button[type=submit]");
$I->dontSee("Incorrect email or password.");
$I->see("page-header");