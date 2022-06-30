<?php

use App\Http\Controllers\DashboardController;
use App\Models\User;
use App\Models\post_;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
Route::get('/latihan', function () {
    return view('abc');
});


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Sintya Tri Wahyu Adityawati",
        "email" => "sintya.tia2704@gmail.com",
        "img" => "sintya.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

//single post
//Route::get('posts/{slug}', [PostController::class,'show']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// $new_post = [];
// foreach ($blog_posts as $pb) {
// if ($pb["slug"] == $slug) {
//  $new_post = $pb;
// }
// }
Route::get('/categories', function(){
    return view('categories',[
        'title'=>'Post Categories',
        'categories'=>Category::all()
    ]);
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function(){
   return view('dashboard.index');
})->middleware('auth');

//Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'posts' => $category->posts->load('category','author'),
//     ]);
// });

//Route::get('/authors/{user:username}', function (User $user) {
  //  return view('Posts', [
    //    'title' => 'User Posts',
      //  'posts' => $user->posts,
    
   // ]);
//});

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('Posts', [
//         'title' => "Post By Author : $author->name",
//       //  'posts' => $author->posts,
//         'posts' => $author->posts->load('category','author'),
//         //kegunaan load sama kayak with, menghindari kesalan n+1
    
//     ]);
// });
