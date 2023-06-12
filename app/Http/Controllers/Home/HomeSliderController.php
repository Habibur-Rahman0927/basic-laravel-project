<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    //
    public function homeSlider(Request $request){
        $homeSlider = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeSlider'));
    }
}
