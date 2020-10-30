<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use Model\Settings;

class SettingsController extends Controller
{


        public function __construct()
    {
        $this->middleware('auth');
    }


     public function LogoList ()
    {
      $list = DB::table('logos')->get();
      return view('backend.settings.logos.list_logo', compact('list'));
    }


    public function LogoAdd ()
    {
    	return view('backend.settings.logos.add_logo');
    }

    public function LogoInsert (Request $request)
    {
    	$pictures = $request->file('pictures');
    	if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Logo';
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
        $insert = DB::table('logos')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Logo Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_logo')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_logo')->with($notification);
             }
    }


 



      public function EditLogo($id)
    {
        $edit=DB::table('logos')
             ->where('id',$id)
             ->first();
        return view('backend.settings.logos.edit_logo', compact('edit'));     
    }

        public function UpdateLogo(Request $request,$id)
    {
      $sliders = DB::table('logos')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Logo';
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

        $update = DB::table('logos')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Logo Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_logo')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_logo')->with($notification);
             }



     
    }


public function DeleteLogo($id)
    {
         $sliders = DB::table('logos')->where('id', $id)->first();
        if(file_exists($sliders->pictures))
        {
            unlink($sliders->pictures);
        }

        $delete = DB::table('logos')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Logo Deleted ',
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
