<?php
use \FunctionalTester;

class RequestFriendCest
{
    public function _before(FunctionalTester $I)
    {
        
        $I->amOnPage('/friends');
        
    }

    public function _after(FunctionalTester $I)
    {
        $I->amOnPage('/friends');
    }

    // tests
    public function makeFriendRequest(FunctionalTester $I)
    {
        $I->fillField('email', 'a@gmail.com');
        $I->click('Send Request');
        $user = User::where('email', '=', 'a@gmail.com');
        $I->amOnPage('/friends');
        $I->seeRecord('friend_user', ['user_id' => $I->id, 'friend_id' => $user->id]);
        
    }
    
    public function acceptFriendRequest(FunctionalTester $I)
    {
        $I->click('')
    }
}
