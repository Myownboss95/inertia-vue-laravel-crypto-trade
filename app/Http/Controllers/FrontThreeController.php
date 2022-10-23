<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontThreeController extends Controller
{
    public function home()
    {
        return view('front3.index');
    }

    public function aboutUs()
    {
        return view('front3.about');
    }

    public function contactUs()
    {
        return view('front3.contact');
    }

    public function faqs()
    {
        return view('front3.faqs');
    }
}
