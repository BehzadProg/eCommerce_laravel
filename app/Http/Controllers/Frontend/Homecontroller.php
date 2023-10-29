<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderBy('priority' , 'asc')->get();
        return view('frontend.home.home', compact('sliders'));
    }
}
