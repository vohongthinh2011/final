<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Search for a movie');
$user = Auth::user();
$I->amOnPage('/feed');
$I->fillField('input', '300');
//$I->click('Search');

//$I->amOnPage('/search');
