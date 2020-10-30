<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/frontend', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend');
Route::get('/backend', [App\Http\Controllers\Backend\BackendController::class, 'index'])->name('backend');

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'index'])->name('logout');


// ACL  Start

Route::get('/userlist1', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserList_byAdmin'])->name('userlist1');
Route::get('/userlist2', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserList_byManager'])->name('userlist2');
Route::get('/useredit/{id}', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserEdit'])->name('useredit');
Route::post('/userupdate', [App\Http\Controllers\Backend\ACL\AclController::class, 'UpdateUser'])->name('userupdate');

Route::get('/userdelete/{id}', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserDelete'])->name('userdelete');




// Notice Management

//backend 

Route::get('/list_notice', [App\Http\Controllers\Backend\NoticeController::class,'NoticeList'])->name('list_notice');

Route::get('/add_notice', [App\Http\Controllers\Backend\NoticeController::class,'NoticeAdd'])->name('add_notice');
Route::post('/insert_notice', [App\Http\Controllers\Backend\NoticeController::class,'NoticeInsert']);
Route::get('/edit_notice/{id}', [App\Http\Controllers\Backend\NoticeController::class,'EditNotice']);

Route::post('/update_notice/{id}', [App\Http\Controllers\Backend\NoticeController::class,'UpdateNotice']);

Route::get('/delete_notice/{id}', [App\Http\Controllers\Backend\NoticeController::class,'DeleteNotice']);


//Frontend

// Route::get('/details_notice/{id}', 'Admin\NoticeController@DetailsNotice');

// End Notice Management



// Contact 

Route::get('/list_contact', [App\Http\Controllers\Backend\ContactController::class,'ContactList'])->name('list_contact');

Route::get('/add_contact', [App\Http\Controllers\Backend\ContactController::class,'ContactAdd']);

Route::post('/insert_contact', [App\Http\Controllers\Backend\ContactController::class,'ContactInsert']);

Route::get('/edit_contact/{id}', [App\Http\Controllers\Backend\ContactController::class,'EditContact']);

Route::post('/update_contact/{id}', [App\Http\Controllers\Backend\ContactController::class,'UpdateContact']);

Route::get('/delete_contact/{id}', [App\Http\Controllers\Backend\ContactController::class,'DeleteContact']);


//Frontend

// Route::post('/insert_contact_frontpage', 'Admin\ContactController@ContactInsert_Frontpage');


// Route::get('/details_contact/{id}', 'Admin\ContactController@DetailsContact');

// End Contact Management



// Event Management

//backend 



Route::get('/list_event', [App\Http\Controllers\Backend\EventController::class,'EventList'])->name('list_event');
Route::get('/add_event', [App\Http\Controllers\Backend\EventController::class,'EventAdd']);

Route::post('/insert_event', [App\Http\Controllers\Backend\EventController::class,'EventInsert']);

Route::post('/update_event/{id}', [App\Http\Controllers\Backend\EventController::class,'UpdateEvent']);

Route::get('/edit_event/{id}', [App\Http\Controllers\Backend\EventController::class,'EditEvent']);

Route::get('/delete_event/{id}', [App\Http\Controllers\Backend\EventController::class,'DeleteEvent']);


//Frontend

// Route::get('/details_event/{id}', 'Admin\EventController@DetailsEvent');

// End Event Management



// Start Slider

Route::get('list_slider', [App\Http\Controllers\Backend\SliderController::class,'ListSlider'])->name('list_slider');
Route::get('/add_slider',[App\Http\Controllers\Backend\SliderController::class,'AddSlider']);
Route::post('/insert_slider', [App\Http\Controllers\Backend\SliderController::class,'InsertSlider']);
Route::post('/update_slider/{id}', [App\Http\Controllers\Backend\SliderController::class,'UpdateSlider']);
Route::get('/edit_slider/{id}', [App\Http\Controllers\Backend\SliderController::class,'EditSlider']);
Route::get('/delete_slider/{id}', [App\Http\Controllers\Backend\SliderController::class,'DeleteSlider']);

// End Slider



// Category Management

//backend 


Route::get('list_category', [App\Http\Controllers\Backend\CategoryController::class,'CategoryList'])->name('list_category');
 Route::get('/add_category',[App\Http\Controllers\Backend\CategoryController::class,'CategoryAdd']);
Route::post('/insert_category', [App\Http\Controllers\Backend\CategoryController::class,'CategoryInsert']);
 Route::get('/edit_category/{id}', [App\Http\Controllers\Backend\CategoryController::class,'EditCategory']);
Route::post('/update_category/{id}', [App\Http\Controllers\Backend\CategoryController::class,'UpdateCategory']);
Route::get('/delete_category/{id}', [App\Http\Controllers\Backend\CategoryController::class,'DeleteCategory']);



//Frontend


// End Category Management


// Post Management

//backend 


Route::get('list_post', [App\Http\Controllers\Backend\PostController::class,'PostList'])->name('list_post');
Route::get('/add_post',[App\Http\Controllers\Backend\PostController::class,'PostAdd']);
Route::post('/insert_post', [App\Http\Controllers\Backend\PostController::class,'PostInsert']);
Route::get('/edit_post/{id}', [App\Http\Controllers\Backend\PostController::class,'EditPost']);
Route::post('/update_post/{id}', [App\Http\Controllers\Backend\PostController::class,'UpdatePost']);
Route::get('/delete_post/{id}', [App\Http\Controllers\Backend\PostController::class,'DeletePost']);


//Frontend


// End Post Management