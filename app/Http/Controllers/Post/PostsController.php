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
        $posts = Post::with('categories')->get();
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
            'title' => 'required',
        ]);

        $file = $request->file('pic');
        $thumb_name = $file->getClientOriginalName();
        $path = $request->file('pic')->storeAs('uploads',$thumb_name);

        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->thumbnail_path = $path;
        $post->author_id = 1; //Auth::user()->id;
        $post->save();
        $post->categories()->attach($request->category_id);
        $msg = "Post created Successfully.";
        return redirect()->route('posts.index')->with('success', $msg);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        $msg = "Category updated Successfully.";
        return redirect()->route('category.edit', $id)->with('success', $msg);
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        $msg = "Category deleted successfully.";
        return redirect()->route('category.index')->with('success', $msg);
    }
}
