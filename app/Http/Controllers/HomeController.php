<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function Homeslider(){
        $sliders= Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function Addslider(){
        return view('admin.slider.create');


    }


    public function storeslider(Request $request){
    $slider_image =$request->file('image');
   $name_gen= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
   Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
   $last_img='image/slider/'.$name_gen;


Slider::insert([
'title'=>$request->title,
'description'=>$request->description,



'image'=>$last_img,
'created_at'=>Carbon::now()


]);
return redirect()->route('home.slider')->with('sucess','Slider added successfully');

    }

    //edit slider 
    public function editslider($id){
        $updatesliders = Slider::find($id);
        return view('admin.slider.edit',compact('updatesliders'));
    }
    //update slider 
    public function updatesilder(Request $request,$id ){

        $old_image =$request->old_image;
        $slider_image =$request->file('image');

        //if else 
        if( $slider_image){
        $name_gen= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img='image/slider/'.$name_gen;
     
     unlink($old_image); 

     Slider::find($id)->update([
     'title'=>$request->title,
     'description'=>$request->description,
     'image'=>$last_img,
     'updated_at'=>Carbon::now()
     
     
     ]);
     return redirect()->route('home.slider')->with('sucess','slider updated successfully');
     
    }
        //if else 

    else{



        Slider::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
      
            'updated_at'=>Carbon::now()
            
            
            ]);
            return redirect()->route('home.slider')->with('sucess','slider updated successfully');
            


    }

    }


    public function Del_silder($id){

        $image= Slider::find($id);
        $old_image =$image->image;
        unlink($old_image);
        Slider::find($id)->delete();
// return redirect()->back()->with('sucess','Slider deleted successfully');
return redirect()->route('home.slider')->with('sucess','slider deleted successfully');





    }


//=====================================
// Our team 

//Admin method 
public function team()
{

    $get_team= Team::all();
    return view('admin.team.index',compact('get_team'));

}



//admin create section method 
public function create(){
    return view('admin.team.create');

}
//store name in DB 

public function store_team(Request $request){


    $team_image =$request->file('image');
    $name_gen= hexdec(uniqid()).'.'.$team_image->getClientOriginalExtension();
    Image::make($team_image)->save('image/team/'.$name_gen);
    // can use resize method 
    $last_img='image/team/'.$name_gen;

    Team::insert([
        'name'=>$request->name,
        'designation'=>$request->designation,
        'image'=>$last_img,
        'created_at'=>Carbon::now()
    ]);

    $notification = array(
        'message' => 'Team Created Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('team')->with($notification);

}

public function our_team()
{

        $team_detail  = Team::get();
    return view('pages.team',compact('team_detail'));
}
}
