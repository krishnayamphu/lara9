<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class HomeController extends Controller
{
   public function index()
   {
    $posts = Post::with('categories')->orderBy('id','desc')->limit(2)->get();
       return view('home',['posts'=>$posts]);
   }

   public function show($id)
   {
       $post = Post::findOrFail($id);
       return view('post-single', ['post' => $post]);
   }

}
