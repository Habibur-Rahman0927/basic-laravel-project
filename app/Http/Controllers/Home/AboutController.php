<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function aboutPage(Request $request){
        $about = About::find(1);
        return view('admin.about_page.about_page_all', compact('about'));
    }

    public function updatePage(Request $request){
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/about_page/' . $name_gen);
            $save_url = 'upload/about_page/'.$name_gen;
            About::find($request->id)->update([
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'sort_description' => $request->sort_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About Page Update with image Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            About::find($request->id)->update([
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'sort_description' => $request->sort_description,
                'long_description' => $request->long_description,
            ]);
            $notification = array(
                'message' => 'About Page Update Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function homeAbout(Request $request){
        $about = About::find(1);
        return view('frontend.about_page', compact('about'));
    }

    public function aboutMultiImage(Request $request){
        return view('admin.about_page.multiImage');
    }

    public function storeMultiImage(Request $request){
        $image = $request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220, 220)->save('upload/about_page/multi_image/' . $name_gen);
            $save_url = 'upload/about_page/multi_image/'.$name_gen;
            MultiImage::insert(['multi_image' => $save_url]);
        }
        $notification = array(
            'message' => 'Multi image Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
