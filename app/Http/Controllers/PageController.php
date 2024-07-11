<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\home;
use App\Models\about;
use App\Models\service;
use App\Models\portfolio;
use App\Models\testmonial;
use App\Models\blog;


class PageController extends Controller
{
    public function showHeader()
    {
        $logo = Logo::latest()->first();
        $home = home::latest()->first();
        $about = about::latest()->first();
        $service = service::all();
        $portfolio = portfolio::latest()->take(3)->get();
        $testmonial = testmonial::all();
        $blog = blog::latest()->take(2)->get();

        return view('index', [
            'logoUrl' => $logo ? $logo->logo_url : null,
            'home' => $home,
            'about' => $about,
            'aboutUrl' => $about ? $about->about_url : null,
            'service' => $service,
            'portfolio' => $portfolio,
            'testmonial' => $testmonial,
            'blog' => $blog,
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
