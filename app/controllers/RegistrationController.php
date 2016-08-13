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
  			'username'	=> 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'gender' => 'required',
            'question' => 'required',
            'answer' => 'required',
            
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
  		$username = Input::get('username');
        $vquestion = Input::get('question');
        $vanswer = Input::get('answer');
        $gender = Input::get('gender');
        $dob = Input::get('year')."-".Input::get('month')."-".Input::get('day');
        
  		try{
  			User::create( [
  				'email'	=> $email,
  				'password'	=> Hash::make($password),
  				'full_name' => $name,
  				'username'	=> $username,
                'profile_pic' => 'default_picture.jpg',
                'gender' => $gender,
                'verification_question' => $vquestion,
                'verification_answer' => $vanswer,
                'date_of_birth' => $dob,
  			] );
  		} catch( Exception $e ) {
  			//Errors Log
  			 Session::flash('error_message', 'Oops! Something is wrong!');
  			return Redirect::back()->withInput();
  		}
  		return Redirect::to('/login');
    }
}
