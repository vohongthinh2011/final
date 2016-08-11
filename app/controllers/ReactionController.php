<?php

class ReactionController extends \BaseController {

    public function postReaction(){
        
        $validation = Validator::make(Input::all(),[
            'content' => 'required',
            'reviewid' => 'required',
        ]);
        
        if($validation->fails()){
            
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }
        
        $user = Auth::user();
        
        try{
            $reaction = Reaction::create([
                'review_id' => Input::get('reviewid'),
                'user_id' => $user->id,
                'name' => $user->full_name,
                'content' => Input::get('content'),
            ]);
        }catch(Exception $e){
            
            Session::flash('error_message', 'Oops! Something went wrong, try again');
            return Redirect::back()->withInput();
        }
        
        return Redirect::to('/feed');
        
    }

}
