<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;

use Illuminate\Support\Facades\Hash;
class Changepass extends Controller
{
    //
    public function Ch_password(){
        return view('admin.body.change_pass');
    }

    public function update_pass(Request $request){
//Validation part 
        $validateData = $request->validate([
            'old_pass'=> 'required',
            'password' => 'required|confirmed'
         
        ]);
    //password save part 
        $hashedPassword =Auth::user()->password;
        //if else start 
        if(Hash::check($request->old_pass,$hashedPassword)){

            $user =User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid password entered ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with( $notification);

        }
        // if else end 

        
    }

    public function profile_update(){
        if(Auth::user()){
            $user= User::find(Auth::user()->id);
           if( $user){
            return view('admin.body.update',compact('user'));

           }
        }

    }

    // update detail 

    public function update_profile(Request $request){

        // $old_image =$request->old_image;
    //     $pro_image =$request->file('photo');

    //     //if else 
    //  if($pro_image){
    //     $name_gen= hexdec(uniqid()).'.'.$pro_image->getClientOriginalExtension();
    //     Image::make($pro_image)->save('storage/profile-photos/'.$name_gen);
    //     $last_img='storage/profile-photos/'.$name_gen;
    //  }
    //  unlink($old_image); 
   
        $user =User::find(Auth::user()->id);
        if($user){
            // $user->profile_photo_path=$request[$last_img];

            $user->name=$request['name'];
            $user->email=$request['email'];
            //Image code 
            if($request->file('photo')){
                $file =$request->file('photo');
        @unlink(public_path('upload/user_image/'.$user->profile_photo_path));
                $filename = date('ymdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_image'),$filename);
                $user['profile_photo_path'] =$filename;
    
    
            }
            //end image code 
            $user->save();
            $notification = array(
                'message' => 'Profile  updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        }
    
        else{

        return redirect()->back();

    }

}
}