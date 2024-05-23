<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::first();
        return view('frontend.pages.contact',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200' ],
            'email' => ['required','max:200'],
            'subject' => ['required','max:200'],
            'message' => ['required','max:200']
        ]);

        $contact = new Contact();
        //


        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        toastr('Created Success!');

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
