<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Email;
use App\Models\PhoneNumber;
use App\Models\PhoneNumer;
use App\Models\Address;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = Contact::orderBy('id','desc')->paginate(10);
        $arrayData = array([
                "res" => 'true',
                "data"=> $contacts]);

        return response()->json($arrayData);



    }

    public function detailsAdress($idContact)
    {
        //
        $contacts = Contact::with(['phoneNumbers', 'emails', 'addresses'])->findOrFail($idContact);
        // $contacts = Addres::where('contact_id', 1)->All(10);
        // $contacts = Email::where('contact_id', 1)->All(10);
        // $contacts = PhoneNumer::where('contact_id', 1)->All(10);
        $arrayData = array([
                "res" => 'true',
                "data"=> $contacts]);

        return response()->json([
            "res" => 'true',
            "data"=> $contacts]);



    }





    public function addContact(Request $request){

        // Validar los datos recibidos
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $address = Contact::create($validatedData);

        return response()->json([
            "res" => true,
            "id" => $address->id,
        ]);
    }

    public function deleteContact($idContact){
        $contact = Contact::findOrFail($idContact);


        //eliminar los registros relacionados
        $contact->addresses()->delete();
        $contact->emails()->delete();


        return response()->json([
            "res" => 'true',
        ]);

    }


    public function addAddress(Request $request){

        // Validar los datos recibidos
        $validatedData = $request->validate([
            'contact_id' => 'required',
            'address' => 'required',
            'created_at' => 'required',
        ]);

        $address = Address::create($validatedData);

        return response()->json([
            "res" => true,
            "id" => $address->id,
        ]);
    }


    public function addEmail(Request $request){

        // Validar los datos recibidos
        $validatedData = $request->validate([
            'contact_id' => 'required',
            'email' => 'required',
            'created_at' => 'required',
        ]);

        $address = Email::create($validatedData);

        return response()->json([
            "res" => true,
            "id" => $address->id,
        ]);
    }


    public function updateAddress(Request $request, $id ){


        // Validar los datos recibidos
        $validatedData = $request->validate([
          'address' => 'required',
       ]);




       $info = Address::findOrFail($id);
       $info->update(['address' => $validatedData['address']]);


       return response()->json([
          "res" => true,
          "id" => $info->id,
      ]);

  }

    public function updateEmail(Request $request, $id ){


        // Validar los datos recibidos
        $validatedData = $request->validate([
          'email' => 'required',
       ]);




       $info = Email::findOrFail($id);
       $info->update(['email' => $validatedData['email']]);


       return response()->json([
          "res" => true,
          "id" => $info->id,
      ]);

  }


    public function addPhone(Request $request){

        // Validar los datos recibidos
        $validatedData = $request->validate([
            'contact_id' => 'required',
            'phone_number' => 'required',
            'created_at' => 'required',
        ]);

        $address = PhoneNumber::create($validatedData);

        return response()->json([
            "res" => true,
            "id" => $address->id,
        ]);
    }


    public function updatePhone(Request $request, $id ){


          // Validar los datos recibidos
          $validatedData = $request->validate([
            'phone_number' => 'required',
         ]);




         $info = PhoneNumber::findOrFail($id);
         $info->update(['phone_number' => $validatedData['phone_number']]);


         return response()->json([
            "res" => true,
            "id" => $info->id,
        ]);

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
