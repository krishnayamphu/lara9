<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        return view('category.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create(['name' => $request->name]);
        $msg="Category created Successfully.";
        return redirect()->route('category.index')->with('success',$msg);

    }

    public function show($id)
    {
        $category=Category::findOrFail($id);
        return view('category.show',['category'=>$category]);
    }

 
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('category.edit',['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->save();

        $msg="Category updated Successfully.";
        return redirect()->route('category.edit',$id)->with('success',$msg);
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        $msg="Category deleted successfully.";
        return redirect()->route('category.index')->with('success',$msg);
    }
}
