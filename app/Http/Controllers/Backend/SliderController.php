<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use Model\Slider;

class SliderController extends Controller
{


        public function __construct()
    {
        $this->middleware('auth');
    }


     public function ListSlider()
    {
      $all = DB::table('sliders')->get();
      return view('backend.slider.list_slider', compact('all'));
    }


    public function AddSlider()
    {
    	return view('backend.slider.add_slider');
    }

    public function InsertSlider(Request $request)
    {
    	$pictures = $request->file('pictures');
    	if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Slider';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(1920, 650)->save($upload_path.'/'.$imageName);
        }

        else
        {
             $image_url = "public/upload/default.png";
        }

        $data = array();
        $data['name'] = $request->name;
        $data['pictures'] = $image_url;
        $insert = DB::table('sliders')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Slider Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_slider')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_slider')->with($notification);
             }
    }


 



      public function EditSlider($id)
    {
        $edit=DB::table('sliders')
             ->where('id',$id)
             ->first();
        return view('backend.slider.edit_slider', compact('edit'));     
    }

        public function UpdateSlider(Request $request,$id)
    {
      $sliders = DB::table('sliders')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Slider';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($sliders->pictures)){
                unlink($sliders->pictures);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(1920, 650)->save($upload_path.'/'.$imageName);
        }
        else
        {
            $image_url = $sliders->pictures;
        }
        
        $data = array();

        $data['name'] = $request->name;
        $data['pictures'] = $image_url;

        $update = DB::table('sliders')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Slider Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_slider')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_slider')->with($notification);
             }



     
    }


public function DeleteSlider($id)
    {
         $sliders = DB::table('sliders')->where('id', $id)->first();
        if(file_exists($sliders->pictures))
        {
            unlink($sliders->pictures);
        }

        $delete = DB::table('sliders')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Slider Deleted ',
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
