<?php

namespace App\Http\Controllers\Backend\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use File;
use Image;


class AclController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function UserList_byAdmin()
    {
    	
        $list = DB::table('users')->get();
    	return view('backend.acl.list', compact('list'));
    
    }


    public function UserList_ByManager()
    {
    	
        $list = DB::table('users')
        ->where('type',3)
        ->get();
    	return view('backend.acl.list', compact('list'));
    
    }


    public function UserEdit($id)
    {
         $user=DB::table('users')->where('id',$id)->first();
         return view('backend.acl.edit',compact('user'));
    }

    // public function UpdateUser(Request $request)
    // {
    //      $id=$request->id;
    //      $data=array();
    //      $data['name']=$request->name;
    //      $data['type']=$request->type;
    //      $data['status']=$request->status;
    //     //  $data['password']=trim(Hash::make($request->password));
         
         
    //      DB::table('users')->where('id',$id)->update($data);
    //      $notification=array(
    //              'messege'=>'Update Successfully',
    //              'alert-type'=>'success'
    //                    );
    //     return Redirect()->route('userlist1')->with($notification);


    // }





    



    


    public function UserDelete($id)
    {
  

        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'User Successfully  Deleted ',
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
