<?php 

class ProfileController extends \BaseController{
    
    public function showProfile(){
        return View::make('profile', ['user' => Auth::user()]);
    }
    
    public function editProfile(){
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
