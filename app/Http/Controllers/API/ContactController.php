<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Email;
use App\Models\PhoneNumer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = Contact::paginate(10);
        $arrayData = array([
                "res" => 'true', 
                "data"=> $contacts]);
        
        return response()->json($arrayData);
       

        
    }

    public function detailsAdress()
    {
        //
        $contacts = Contact::where("id",1)->get();
        // $contacts = Addres::where('contact_id', 1)->All(10);
        // $contacts = Email::where('contact_id', 1)->All(10);
        // $contacts = PhoneNumer::where('contact_id', 1)->All(10);
        $arrayData = array([
                "res" => 'true', 
                "data"=> $contacts[0]->emails]);
        
        return response()->json($arrayData);
       

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
