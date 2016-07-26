<?php
	$I = new FunctionalTester($scenario);
	$I ->wantTo('Login to Cinemaphile');

	$I->amOnPage('/signup');

	$I ->fillField('email', 'cat@cat.com')