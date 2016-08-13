<?php

class AuthenticationController extends \BaseController {

	public function showLoginView(){
		return View::make('login');
	}

	public function loginUser(){
		$validation = Validator::make(Input::all(),[
			'email' =>' required',
			'password' => 'required',
		]);


	if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }


		if (Auth::attempt(Input::only('email', 'password'), true)){
			return Redirect::to('/feed');
		} else {
			Session::flash('error_message', 'We couldn\'t find your email or password combination');
			return Redirect::to('/login')->withInput();
		}
	}

	public function logout(){
		Session::flush();
        Auth::logout();
        return Redirect::to('/login');
	}
	



}
