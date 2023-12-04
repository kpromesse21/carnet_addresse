<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

    }
    public function show(){

    }

    public function create(){

        $contacts=Contact::orderBy("name")->get();
        // dd(strcmp('contacti','contocts'));
        // dd($contacts);
        // dd(strtolower("KAJ"));
        
    

        return view('contact.formAdd',['contacts'=>$contacts]);

    }
    public function store(Request $request){

        // dd($request);
        $contact=new Contact();
        $contact->name=$request->nom;
        $contact->email=$request->email;
        $contact->numero=$request->numero;
        $contact->description=$request->desc;

        $contact->save();

        return redirect()->route("contact_create");


    }
}
