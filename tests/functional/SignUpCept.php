<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Sign up for CinemaPhile');
$I->amOnPage('/signup');
//fill all required input 
$I->fillField('full_name', 'test');
$I->fillField('username', 'test');
$I->fillField('email', 'test@gmail.com');
$I->fillField('password', 'test');
$I->fillField('repassword', 'test');
$I->selectOption('gender', 'male');
$I->grabTextFrom('select option:nth-child(2)');
$I->grabTextFrom('select option:nth-child(2)');
$I->grabTextFrom('select option:nth-child(2)');
$I->fillField('question', 'test');
$I->fillField('answer', 'test');
$I->click('Sign Up');

//results 
$I->amOnPage('/login');
$I->seeRecord('users', ['email' => 'test@gmail.com']);


//$I->seeCurrentUrlEquals('/login');
//submitForm()



