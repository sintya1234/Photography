<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
  public function index()
  {
    $title = '';
    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = ' in ' . $category->name;
    }
    if (request('author')) {
      $author = User::firstWhere('username', request('author'));
      $title = ' by ' . $author->name;
    }

    return view('posts', [
      "title" => "All Posts" . $title,
      // "posts" => Post::all()
      //   "posts" => Post::latest()->get()//untuk menampilkan yang terakhir diatas
      "posts" => Post::with(['author', 'category'])->latest()->filter(request(['cari', 'category', 'author']))->paginate(7)->withQueryString()
      //with bla bla bla dipake agar menghimdari kesalahan n+1, supaya dia gak nge query ke database berkali2, jadi sekali aja query post langsung kategory dan author dapet.
    ]);
  }
  //public function show($slug){
  // return view('post', [
  //    "title" => "single Post",
  //   "post" => Post::find($slug),
  // ]);
  // }
  public function show(Post $post)
  {
    return view('post', [
      "title" => "single Post",
      "post" => $post
    ]);
  }
}
