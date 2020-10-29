<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Notice;
use File;
use Image;

class NoticeController extends Controller
{


      public function __construct()
    {
        $this->middleware('auth');
    }


     public function NoticeList()
    {
    	
    	$list = DB::table('notices')->get();
    	return view('backend.notice.list_notice', compact('list'));
    
    }

          public function DetailsNotice($id)
    {
        $details=DB::table('notices')
        ->where('notices.id',$id)
        ->first();
        return view('frontend.layouts.notice_details', compact('details'));     
    }



    public function NoticeAdd()
    {
    	return view('backend.notice.add_notice');
    }

    

    public function NoticeInsert(Request $request)
    {
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/notice';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(200, 200)->save($upload_path.'/'.$imageName);
        }

        else
        {
             $image_url = "public/upload/default.jpg";
        }

        $data = array();
        $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['date'] = $request->date;
        $data['pictures'] = $image_url;
        $insert = DB::table('notices')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Notice Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_notice')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_notice')->with($notification);
             }



    

  
    }


 



      public function EditNotice($id)
    {
        $edit=DB::table('notices')
             ->where('id',$id)
             ->first();
        return view('backend.notice.edit_notice', compact('edit'));     
    }

        public function UpdateNotice(Request $request,$id)
    {
      $teachers = DB::table('notices')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Notice';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($teachers->pictures)){
                unlink($teachers->pictures);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(200, 200)->save($upload_path.'/'.$imageName);
        }
        else
        {
            $image_url = $teachers->pictures;
        }
        
        $data = array();

        $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['date'] = $request->date;
        $data['pictures'] = $image_url;

        $update = DB::table('notices')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Notice Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_notice')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_notice')->with($notification);
             }



     
    }


public function DeleteNotice($id)
    {
         $teacher = DB::table('notices')->where('id', $id)->first();
        if(file_exists($teacher->pictures))
        {
            unlink($teacher->pictures);
        }

        $delete = DB::table('notices')->where('id', $id)->delete();
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
