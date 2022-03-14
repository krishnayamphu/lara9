<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(){
         
        $directory="uploads"; //storage/app/uploads
        $files = Storage::allFiles($directory);
        $images=array();
        foreach ($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION); //pathinfo() is php function
            if($ext=='jpg'||$ext=='png'||$ext=='gif'){
                $images[]= $file;
            }
            
          }
        return view("media",['files'=>$images]);
    }

    public function upload(){
        return view("upload");
    }

    public function store(Request $request){
        $path = $request->file('myfile')->store('public');
        // $path = Storage::putFile('public', $request->file('myfile'));
        return redirect()->route('upload')->with('success','File upload successfully.');
    }
}
