<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\home;







class PageController extends Controller
{
    public function showHeader()
    {
        $logo = Logo::latest()->first();
        $home = home::latest()->first();

        return view('index', [
            'logoUrl' => $logo ? $logo->logo_url : null,
            'home' => $home,
        ]);
    }






    // public function submitContactForm(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     contactForm::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'message' => $request->message,
    //     ]);

    //     return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    // }
}
