<?php

class RegistrationController extends \BaseController {

  public function showSignUpView(){
  		if( Auth::check() ) {
  			return Redirect::to('/feed');
  		}
  		return View::make('signup');
  	}


  public function signUp() {

  		$validation = Validator::make(Input::all(), [
  			'email' =>' required|unique:users',
  			'password' => 'required',
  			'repassword' => 'required',
  			'full_name'	=> 'required',
  			'username'	=> 'required'
  		] );

  		if( $validation->fails() ) {
              $messages = $validation->messages();
              Session::flash('validation_messages', $messages);
              return Redirect::back()->withInput();
          }

  		$email = Input::get('email');
  		$password = Input::get('password');
  		$repassword = Input::get('repassword');
  		$name = Input::get('full_name');
  		$gender = Input::get('username');

  		try{
  			User::create( [
  				'email'	=> $email,
  				'password'	=> Hash::make($password),
  				'full_name' => $name,
  				'username'	=> $gender
  			] );
  		} catch( Exception $e ) {
  			//Errors Log
  			 Session::flash('error_message', 'Oops! Something is wrong!');
  			return Redirect::back()->withInput();
  		}
  		Session::flash('success_message', 'Success! Welcome to Our Facbook');
  		return Redirect::to('/login');
    }
}
