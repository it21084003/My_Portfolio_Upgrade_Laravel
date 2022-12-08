<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\StudentCountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\LikeDislikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessagesController;


//user
Route::get('/',[UserController::class,'index']);
Route::get('/post',[UserController::class,'postsindex']);
Route::get('/post/{id}/details',[UserController::class,'postsDetailsIndex']);
Route::get('/search_post',[UserController::class,'search']);
Route::get('/search_post_by_cartegory/{catId}',[UserController::class,'searchByCategory']);

    //like and dislike
    Route::post('/post/like/{postId}',[LikeDislikeController::class,'like']);
    Route::post('/post/dislike/{postId}',[LikeDislikeController::class,'dislike']);

    //Comment
    Route::post('/post/comment/{postId}',[CommentController::class,'comment']);

    //Message
    Route::get('/message',[MessagesController::class,'message'])->name('message');

//admin
Route::group(['prefix' => 'admin','middleware' => ['auth','isAdmin']],function(){
    Route::get('/dashboard',[AdminDashboardController::class,'index']);

    //user
    Route::get('/users',[App\Http\Controllers\admin\UserController::class,'index']);
    //edit user
    Route::get('/users/{id}/edit',[App\Http\Controllers\admin\UserController::class,'edit']);
    //update user
    Route::post('/users/{id}/update',[App\Http\Controllers\admin\UserController::class,'update']);
    //delete user
    Route::post('/users/{id}/delete',[App\Http\Controllers\admin\UserController::class,'delete']);

    //Skill
    //used resource
    Route::resource('skills', SkillController::class);

    //Project used resource
    Route::resource('projects', ProjectController::class);

    //Student Count
    Route::get('student_counts',[App\Http\Controllers\admin\StudentCountController::class,'index'])->name('student_counts.index');
    Route::post('student_counts/store',[App\Http\Controllers\admin\StudentCountController::class,'store']);
    Route::post('student_counts/{id}/update',[App\Http\Controllers\admin\StudentCountController::class,'update']);

    //Category
    Route::resource('category', CategoryController::class);

    //Post
    Route::resource('posts', PostController::class);
    //Route::get('posts', PostController::class);
    Route::post('/comment/{commentId}/show_hide', [App\Http\Controllers\admin\PostController::class,'showHideComment']);

    //Message
    Route::post('messages',[App\Http\Controllers\admin\MessagesController::class,'index'])->name('message.index');


});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth','isAdmin'])->group(function(){
//     Route::get('/admin',function(){
//         return view('admin.dashboard');
//     })->name('dashboard');
// });
