<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Registration');
$I->amOnPage("/");
$I->see("page-header");
$I->click("Sign up");
$I->seeInCurrentUrl("signup");
$I->see('Please fill out the following fields to signup:');
$I->fillField('Name', 'Miles');
$I->fillField('Login (Email)', '2@cept.cept');
$I->fillField('Password', 'testtest');
$I->click("form button[type=submit]");
$I->dontSee("This email address has already been taken");
$I->see("page-header"); 
$I->see('Logout (2@cept.cept)');


