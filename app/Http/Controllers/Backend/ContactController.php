<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Contact;
use File;
use Image;


class ContactController extends Controller
{
            public function __construct()
    {
        $this->middleware('auth');
    }

    public function ContactList()
    {
    	
    	$list = DB::table('contacts')->get();
    	return view('backend.contact.list_contact', compact('list'));
    
    }

          public function DetailsContact($id)
    {
        $details=DB::table('contacts')
        ->where('contacts.id',$id)
        ->first();
        return view('frontend.layouts.contact_details', compact('details'));     
    }



    public function ContactAdd()
    {
    	return view('backend.contact.add_contact');
    }

    

        public function ContactInsert_Frontpage(Request $request)
    {
       
        $data = array();
        $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['mobile'] = $request->mobile;
       
        $insert = DB::table('contacts')->insert($data);
        if ($insert) {


            
                 $notification=array(
                 'messege'=>'Your Messages is Successfully Submitted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }

             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }



    

  
    }

    public function ContactInsert(Request $request)
    {
       
        $data = array();
        $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['mobile'] = $request->mobile;
       
        $insert = DB::table('contacts')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Contact Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_contact')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_contact')->with($notification);
             }



    

  
    }


 



      public function EditContact($id)
    {
        $edit=DB::table('contacts')
             ->where('id',$id)
             ->first();
        return view('backend.contact.edit_contact', compact('edit'));     
    }

        public function UpdateContact(Request $request,$id)
    {
         
        $data = array();

       $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['mobile'] = $request->mobile;

        $update = DB::table('contacts')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Contact Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_contact')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_contact')->with($notification);
             }



     
    }


public function DeleteContact($id)
    {
  

        $delete = DB::table('contacts')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Notice Deleted ',
                            'alert-type'=>'success'
                            );
                            return Redirect()->back()->with($notification);                      
                            }
             else
                  {
                  $notification=array(
                  'messege'=>'error ',
                  'alert-type'=>'error'
                  );
                  return Redirect()->back()->with($notification);

                  }

      }
}
