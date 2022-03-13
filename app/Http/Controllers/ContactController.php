<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        return view('contact-form');
    }

    public function getAllContacts(){
        $contacts=Contact::all();

       return view('contact.index',['contacts'=>$contacts]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:10|max:15',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact=new \App\Models\Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->mobile=$request->mobile;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();

        //mass assignment method

        // Contact::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'mobile' => $request->mobile,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        // ]);
            $msg="Message Send Successfully.";
        return redirect()->route('contact.index')->with('success',$msg);


    }

    public function show($id)
    {
        $contact=Contact::findOrFail($id);

        return view('contact.show',['contact'=>$contact]);
    }

    public function edit($id)
    {
        $contact=Contact::findOrFail($id);

        return view('contact.edit',['contact'=>$contact]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:10|max:15',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact=Contact::findOrFail($id);
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->mobile=$request->mobile;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();

        $msg="Message updated Successfully.";
        return redirect()->route('contact.edit',$id)->with('success',$msg);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        $msg="Contact deleted successfully.";
        return redirect()->route('contact.all')->with('success',$msg);
    }
}
