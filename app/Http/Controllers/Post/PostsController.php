<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->orderBy('id','desc')->simplePaginate(2);
        // return $posts;
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
        ]);

        $file = $request->file('pic');
        $post = new Post();
        if ($file == null) {
            $post->thumbnail_path = null;
        } else {
            $thumb_name = $file->getClientOriginalName();
            $path = $request->file('pic')->storeAs('uploads', $thumb_name);
            $post->thumbnail_path = $path;
        }
        $post->title = $request->title;
        $post->text = $request->text;
        $post->author_id = 1; //Auth::user()->id;
        $post->save();
        $post->categories()->attach($request->categories);
        $msg = "Post created Successfully.";
        return redirect()->route('posts.index')->with('success', $msg);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $file = $request->file('pic');
        $post = Post::with('categories')->findOrFail($id);
        if ($file == null) {
            $post->thumbnail_path = $request->thumb;
        } else {
            $thumb_name = $file->getClientOriginalName();
            $path = $request->file('pic')->storeAs('uploads', $thumb_name);
            $post->thumbnail_path = $path;
        }

        $post->title = $request->title;
        $post->text = $request->text;
        $post->author_id = 1; //Auth::user()->id;
        $post->save();
        $post->categories()->sync($request->categories);
        $msg = "Post Updated Successfully.";
        return redirect()->route('posts.edit', $id)->with('success', $msg);
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        $msg = "Post deleted successfully.";
        return redirect()->route('posts.index')->with('success', $msg);
    }
}
