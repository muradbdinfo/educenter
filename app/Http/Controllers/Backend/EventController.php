<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Event;
use File;
use Image;

class EventController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function EventList()
    {
    	
    	$list = DB::table('events')->get();
    	return view('backend.event.list_event', compact('list'));
    
    }

          public function DetailsEvent($id)
    {
        $details=DB::table('events')
        ->where('events.id',$id)
        ->first();
        return view('frontend.layouts.event_details', compact('details'));     
    }



    public function EventAdd()
    {
    	return view('backend.event.add_event');
    }

    

    public function EventInsert(Request $request)
    {
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Event';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(200, 200)->save($upload_path.'/'.$imageName);
        }

        else
        {
             $image_url = "default.png";
        }

        $data = array();
        $data['name'] = $request->name;
        $data['details'] = $request->details;
        $data['date'] = $request->date;
        $data['location'] = $request->location;
        $data['pictures'] = $image_url;
        $insert = DB::table('events')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully event Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_event')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_event')->with($notification);
             }



    

  
    }


 



      public function EditEvent($id)
    {
        $edit=DB::table('events')
             ->where('id',$id)
             ->first();
        return view('backend.event.edit_event', compact('edit'));     
    }

        public function UpdateEvent(Request $request,$id)
    {
      $teachers = DB::table('events')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures))
        {
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Event';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path))
             {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($teachers->pictures))
            {
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
         $data['location'] = $request->location;
        $data['pictures'] = $image_url;

        $update = DB::table('events')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Event Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_event')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_event')->with($notification);
             
         }



     
    }


public function DeleteEvent($id)
    {
         $teacher = DB::table('events')->where('id', $id)->first();
        if(file_exists($teacher->pictures))
        {
            unlink($teacher->pictures);
        }

        $delete = DB::table('events')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Event Deleted ',
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
