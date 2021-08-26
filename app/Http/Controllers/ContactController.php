<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactForm;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

	//  public function __construct(){
    //     $this->middleware('auth');
    // }
    // //  1st part ex 
    // public function index(){
    //     // echo "<h1>This is a contact page </h1>";
    //     return view('contact');
    // }
    // public function about(){
    //     // echo "<h1>This is a contact page </h1>";
    //     return view('about');
    // }

    public  function Admin_contact(){
            $contacts =Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function Add_contact(){
        return view('admin.contact.create');

    }

    public function store_Contacts(Request $request){
        Contact::insert([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()



        ]);
return redirect()->route('Admin_contact')->with('success','Contact inserted successfully');
    }

//edit method 
public function edit_contact($id ){
            $fill_Contact=Contact::find($id);

            return view('admin.contact.edit',compact('fill_Contact'));
}

//update method 


public function contact_update(Request $resuest, $id){

    Contact::find($id)->update([
        'address'=>$resuest->address,
        'email'=>$resuest->email,
        'phone'=>$resuest->phone,
        'updated_at'=>Carbon::now()


    ]);
return redirect()->route('Admin_contact')->with('success','Contact updated successfully');


}
//del method 
    public function del_Contacts($id){
        Contact::find($id)->delete();
return redirect()->route('Admin_contact')->with('success','Contact deleted successfully');
        

    }


    //View on home page 

    public function contact(){

        $contacts= DB::table('contacts')->first();
        return view('pages.contact', compact('contacts') );
    }

    public function user_message(Request $resuest){

        ContactForm::insert([
            'name'=>$resuest->name,
            'email'=>$resuest->email,
            'subject'=>$resuest->subject,
            'message'=>$resuest->message,
            'created_at'=>Carbon::now()
        

        ]);
return redirect()->back()->with('success','Your Message send successfully');

    }

    public function admin_msg(){

            $messages= ContactForm::all();
        return view('pages.message' , compact('messages'));
    }
 

    // del funtion 

    public function Del_msg($id){
        ContactForm::find($id)->delete();
return redirect()->back()->with('success','Message deleted successfully');


    }
}
