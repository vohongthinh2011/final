<?php 

class ProfileController extends \BaseController{
    
    public function showProfile(){
        $user = Auth::user();

        
        return View::make('profile', ['user' => $user]);
    }

    public function showFeed(){
        $user_reviews = Review::where('user_id' , '=', $user->id)->get();
        return View::make('profile', ['reviews' => $user_reviews]);
    }
    
    public function editProfile(){
        
    }
    
    public function addImage(){
        $user = Auth::user();
        if(Input::hasFile('picture')){
            $file = Input::file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/' . $filename);
            $photo = Image::make($file->getRealPath())->resize(300, 200)->save($path);
            $user->profile_pic = $filename;
            $user->save();
       }
       return View::make('profile', ['user' => $user]);
   }
   
    
}
