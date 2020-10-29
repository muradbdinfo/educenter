<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Gallery;
use File;
use Image;

class GalleryController extends Controller
{

    //     public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function ListGallery()
    {
      $all = DB::table('gallerys')
       ->join('gallerycategoris', 'gallerycategoris.id', '=', 'gallerys.category_id')
       ->select('gallerycategoris.name as category','gallerys.*')
                        ->get();
      return view('admin.gallery.list_gallery', compact('all'));
    }


    public function AddGallery()
    {
    	return view('admin.gallery.add_gallery');
    }

    public function InsertGallery(Request $request)
    {
    	$pictures = $request->file('pictures');
    	if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Gallery';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(290, 180)->save($upload_path.'/'.$imageName);
        }

        else
        {
             $image_url = "default.png";
        }

        $data = array();
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $data['pictures'] = $image_url;
        $insert = DB::table('gallerys')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Gallery Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_gallery')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_gallery')->with($notification);
             }
    }


 



      public function EditGallery($id)
    {
        $edit=DB::table('gallerys')
             ->where('id',$id)
             ->first();
        return view('admin.gallery.edit_gallery', compact('edit'));     
    }

        public function UpdateGallery(Request $request,$id)
    {
      $sliders = DB::table('gallerys')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Gallery';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($sliders->pictures)){
                unlink($sliders->pictures);
            }
            $img = Image::make($pictures->getRealPath());
            $img->resize(290, 180)->save($upload_path.'/'.$imageName);
        }
        else
        {
            $image_url = $sliders->pictures;
        }
        
        $data = array();

       $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $data['pictures'] = $image_url;

        $update = DB::table('gallerys')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully  Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_gallery')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_gallery')->with($notification);
             }



     
    }


public function DeleteGallery($id)
    {
         $sliders = DB::table('gallerys')->where('id', $id)->first();
        if(file_exists($sliders->pictures))
        {
            unlink($sliders->pictures);
        }

        $delete = DB::table('sliders')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Product Deleted ',
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
