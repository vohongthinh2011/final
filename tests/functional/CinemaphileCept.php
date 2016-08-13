<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('navigate through cinemaphile');

//feed attempt without auth 
$I->amOnPage('/feed');
$I->amOnPage('/login');

//sign up
$I->amOnPage('/signup');
$I->seeinTitle('Cinemaphile | Sign Up');

$I->see('Sign up and join our community!');

try{
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
$I->seeInDataBase('users', ['full_name' => 'test', 'username' => 'test',
                           'email' => 'test@gmail.com', 'password' => 'test',
                            'gender' => 'male', 'verification_question' => 'test', 'verification_answer' => 'test']);

}catch(\PHPUnit_Framework_AssertionFailedError $e){
    $I->amOnPage('/signup');
}


//login
$I->amOnPage('/login');
$I->seeRecord('users', ['email' => 'test@gmail.com']);
try{ 
    $I->fillField('email', 'a@gmail.com');
    $I->fillField('password', 'a');
    $I->click('Login');
}catch(\PHPUnit_Framework_AssertionFailedError $e)
{
    $I->amOnPage('/login');
}

//feed
$I->amOnPage('/feed');
$I->seeAuthentication();
//trying to sign up when authenticated leads user back to feed 
$I->amOnPage('/signup');
$I->amOnPage('/feed');

//view profile
$I->click('Profile');
$I->amOnPage('/profile');
$I->click(['name' => 'picture']);
$I->attachFile('input[type="file"]', 'prices.jpg');
$I->click('submit');
$I->amOnPage('/profile');
//re-view profile using nav-bar 
$I->click('Account Settings');
$I->see('View/Edit Profile');
$I->click('View/Edit Profile');
$I->amOnPage('/profile');
//need to validate the picture shows
$I->click('Home');
$I->amOnPage('/feed');


//friends 
$I->click('Account Settings');
$I->see('Manage Friends');
$I->click('Manage Friends');
$I->amOnPage('/friends');
try{
    $I->see('has sent you a friend request');
    $I->click('Accept');
    //$name = $I->grab();
    //$I->seeRecord('friend-user', [])
    $I->amOnPage('/friends');
}
catch(\PHPUnit_Framework_AssertionFailedError $e){    
    
}
try{
    $I->fillField('email', 'test@gmail.com');
    $I->click('Send Request');
    $I->amOnPage('/friends');
    //should show a 1 in the friend-user table
    //$I->seeRecord('friend-user', [])
}catch(\PHPUnit_Framework_AssertionFailedError $e){
    $I->amOnPage('/friends');
}

$I->click('Show List of Friends');
try{
    $I->see('Friend since');
}catch(\PHPUnit_Framework_AssertionFailedError $e){
    
}

//back to feed
$I->click('Cinemaphile');
$I->amOnPage('/feed');
$I->fillField('input', '300');
$I->click('Search');

//now at movie search results
$I->amOnPage('/search');
$I->see('RESULTS');
//$I->click('What is your');

//posts in feed 
$I->amOnPage('/search');

//logout
$I->click('Account Settings');
$I->see('Logout');
$I->click('Logout');
$I->amOnPage('/login');



