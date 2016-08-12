<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Login to Cinemaphile');

$I->haveRecord('users', [
    'email' => 'a@gmail.com',
    'password' => Hash::make('password'),
]);

$I->amOnPage('/login');
$I->fillField('email', 'a@gmail.com');
$I->fillField('password', 'a');
$I->click('Login');

$I->amOnPage('/feed');
$I->seeAuthentication();

