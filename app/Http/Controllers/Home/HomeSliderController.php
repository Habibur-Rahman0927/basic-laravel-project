<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{
    //
    public function homeSlider(Request $request){
        $homeSlider = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeSlider'));
    }

    
    public function updateSlider(Request $request){
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/'.$name_gen;
            HomeSlide::find($request->id)->update([
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url,
            ]);
            $notification = array(
                'message' => 'Home slide Update with image Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            HomeSlide::find($request->id)->update([
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'video_url' => $request->video_url,
            ]);
            $notification = array(
                'message' => 'Home slide Update Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}
