<?php

namespace App\Http\Controllers;
use App\Models\Multipic;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;

class AboutController extends Controller
{
    // Home page vide code 
public function homeabout(){
    $home_about = HomeAbout::latest()->get();
    return view('admin.home.index',compact('home_about'));

}
 

//add about controller
public function Addabout(){
    return view('admin.home.create');

}

//Store about 

public function store_about(Request $resquest){

        HomeAbout::insert([

        'title'=>$resquest->title,
        'short_dis'=>$resquest->short_dis,
        'long_dis'=>$resquest->long_dis,
        'created_at'=>Carbon::now()



    ]);
    $notification = array(
        'message' => 'About Message inserted successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('home.about')->with($notification );

}

//edit page vide code 
public function editabout($id){
        $get_about= HomeAbout::find($id);
    return view('admin.home.edit',compact('get_about'));
}


//update about

public function update_about(Request $request, $id){
    

    HomeAbout::find($id)->update([
        'title'=>$request->title,
        'short_dis'=>$request->short_dis,
        'long_dis'=>$request->long_dis,
        'updated-at'=>Carbon::now()

    ]);
    $notification = array(
        'message' => 'About Message Updated successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('home.about')->with($notification);


}

//Delete method 

public function delete_about($id){
 
    HomeAbout::find($id)->delete();
    $notification = array(
        'message' => 'About Message Deleted successfully',
        'alert-type' => 'info'
    );
    return redirect()->route('home.about')->with(  $notification);

}

//portfolio method 
public function Portfolio(){
    $images=Multipic::all();
    return view('pages.portfolio',compact('images'));
}

}
