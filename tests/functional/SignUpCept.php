<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Sign up for CinemaPhile');
$I->amOnPage('/');
$I->click('Sign Up for Free');
$I->seeCurrentUrlEquals('/signup');
//fill all required input 
$I->fillField('full_name', 'test');
$I->fillField('username', 'test');
$I->fillField('email', 'test@gmail.com');
$I->fillField('password', 'test');
$I->fillField('repassword', 'test');
$I->selectOption('gender', 'male');
$I->grabTextFrom('select[name="day"] option:nth-child(2)');
$->gradb
/*
$I->fillField('month', 'Jan');
$I->fillField('year', 1980);
$I->fillField('question', 'test');
$I->fillField('answer', 'test');

//$I->seeCurrentUrlEquals('/login');

//

//submitForm()
//click()
//amOnPage()
//wantTo()
//fillField()
//see("hello world)
//seeIntDatabase('tablename', ['email' => 'mfdkd'])
//lookForwardTo('being a member of the community)

$I->seeRecord('users', ['email' => 'example@example.com']);