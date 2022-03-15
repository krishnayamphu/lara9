<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(){
         
        $directory="uploads"; //storage/app/uploads
        $files = Storage::allFiles('uploads');

        $images=array();
        foreach ($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION); //pathinfo() is php function
            if($ext=='jpg'||$ext=='png'||$ext=='gif'){
                $images[]=htmlspecialchars($file);
            }
            
          }
        return view("media",['files'=>$images]);
    }

    public function store(Request $request){
        $path = $request->file('myfile')->store('uploads');
        // $path = Storage::putFile('uploads', $request->file('myfile'));
        return redirect()->route('media.index')->with('success','File upload successfully.');
    }

    public function destroy(Request $request){
        $filename = $request->pic;
        Storage::delete($filename);
        return redirect()->route('media.index')->with('success','File deleted successfully.');
    }


}
