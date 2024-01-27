<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TermAndCondition;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about' , compact('about'));
    }

    public function termsAndConditions()
    {
        $term = TermAndCondition::first();
        return view('frontend.pages.termsAndCondition' , compact('term'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contact');
    }
}
