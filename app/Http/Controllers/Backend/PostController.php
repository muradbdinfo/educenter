<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Post;
use File;
use Image;

class PostController extends Controller
{


      public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function PostList()
    {
    	
    	$list = DB::table('posts')->get();
    	return view('backend.post.list_post', compact('list'));
    
    }

          public function DetailsPost($id)
    {
        $details=DB::table('posts')
        ->join('categoris', 'categoris.id', '=', 'posts.categori_id')
        ->join('users', 'users.id', '=', 'posts.author_id')               
        ->select('users.name as author','categoris.name as category','posts.*')
        ->where('posts.id',$id)
        ->first();
        return view('frontend.layouts.post_details', compact('details'));     
    }



    public function PostAdd()
    {
    	return view('backend.post.add_post');
    }

    

    public function PostInsert(Request $request)
    {
       $pictures = $request->file('pictures');
        if(isset($pictures)){
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Post';
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
		$data['categori_id'] = $request->categori_id;
		$data['author_id'] = $request->author_id;
		$data['pictures'] = $image_url;
		$data['date'] = now();
        $insert = DB::table('posts')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Post Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_post')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_post')->with($notification);
             }




    

  
    }


 



      public function EditPost($id)
    {
        $edit=DB::table('posts')
             ->where('id',$id)
             ->first();
        return view('backend.post.edit_post', compact('edit'));     
    }

        public function UpdatePost(Request $request,$id)
    {
      $teachers = DB::table('posts')->where('id', $id)->first();
        $pictures = $request->file('pictures');
        if(isset($pictures))
        {
            $imageName = uniqid().'.'.$pictures->getClientOriginalExtension();
            $upload_path='public/upload/Post';
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
        $data['categori_id'] = $request->categori_id;
        $data['author_id'] = $request->author_id;
        $data['pictures'] = $image_url;
        $data['date'] = now();

        $update = DB::table('posts')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Post Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_post')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_post')->with($notification);
             
         }



     
    }


public function DeletePost($id)
    {
         $teacher = DB::table('posts')->where('id', $id)->first();
        if(file_exists($teacher->pictures))
        {
            unlink($teacher->pictures);
        }

        $delete = DB::table('posts')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Post Deleted ',
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
