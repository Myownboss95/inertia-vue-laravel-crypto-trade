<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $theme;
    public function __construct()
    {
        $this->theme = config('app.theme', 'front2');
    }
    public function home()
    {
        return view("$this->theme.home");
    }

    public function about()
    {
        return view("$this->theme.about-us");
    }


    public function contact()
    {
        return view("$this->theme.contatct");
    }

    public function terms_and_conditions()
    {
        return view("$this->theme.terms-and-conditions");
    }

    public function faqs()
    {
        return view("$this->theme.faqs");
    }
}
