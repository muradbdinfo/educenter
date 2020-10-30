<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Model\Post;
use File;
use Image;

class CategoryController extends Controller
{


      public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function CategoryList()
    {
    	
    	$list = DB::table('categoris')->get();
    	return view('backend.category.list_category', compact('list'));
    
    }




    public function CategoryAdd()
    {
    	return view('backend.category.add_category');
    }

    

    public function CategoryInsert(Request $request)
    {
    
        $data = array();
		$data['name'] = $request->name;
		
        $insert = DB::table('categoris')->insert($data);
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Category Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_category')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_category')->with($notification);
             }




    

  
    }


 



      public function EditCategory($id)
    {
        $edit=DB::table('categoris')
             ->where('id',$id)
             ->first();
        return view('backend.category.edit_category', compact('edit'));     
    }

        public function UpdateCategory(Request $request,$id)
    {
      
       
        
        $data = array();

        $data['name'] = $request->name;
        

        $update = DB::table('categoris')->where('id', $id)->update($data);

        if ($update) {
                 $notification=array(
                 'messege'=>'Successfully Category Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('list_category')->with($notification);                      
             }
             else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('list_category')->with($notification);
             
         }



     
    }


public function DeletePost($id)
    {
    
        $delete = DB::table('categoris')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Category Deleted ',
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
