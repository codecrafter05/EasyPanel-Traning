<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        // Create a new form submission
        Form::create($request->all());

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}

