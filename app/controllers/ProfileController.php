<?php 

class ProfileController extends \BaseController{
    
    public function showProfile(){
        $user = Auth::user();
        $user_response = [];

        $user_reviews = Review::where('user_id' , '=', $user->id)->get();
        foreach($user_reviews as $user_review){
            $user_response[$user_review->review_id] = Reaction::where('review_id', '=', $user_review->review_id)->get();
        }
        
        return View::make('profile', [
            'user' => $user,
            'reviews' => $user_reviews,
            'responses' => $user_response
            ]);
    }
    
    public function editProfile(){
        $user = Auth::user();
        $user_reviews = Review::where('user_id' , '=', $user->id)->get();
        if(Input::hasFile('picture')){
            $file = Input::file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/' . $filename);
            $photo = Image::make($file->getRealPath())->resize(300, 200)->save($path);
            $user->profile_pic = $filename;
            $user->save();
       }
       $user_response = [];
       foreach($user_reviews as $user_review){
            $user_response[$user_review->review_id] = Reaction::where('review_id', '=', $user_review->review_id)->get();
        }
       return View::make('profile', ['user' => $user,
        'reviews' => $user_reviews,
        'responses' => $user_response]);
   }
    
    
    
        
   
    
}
