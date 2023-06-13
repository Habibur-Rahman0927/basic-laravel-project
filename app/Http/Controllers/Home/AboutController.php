<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function aboutPage(Request $request){
        $about = About::find(1);
        return view('admin.about_page.about_page_all', compact('about'));
    }
}
