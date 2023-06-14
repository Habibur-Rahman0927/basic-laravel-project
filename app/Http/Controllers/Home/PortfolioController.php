<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Image;

class PortfolioController extends Controller
{
    //
    public function allPortfolio(Request $request){
        $allPortfolio = Portfolio::all();
        return view('admin.portfolio_page.all_portfolio_page', compact('allPortfolio'));
    }

    public function addPortfolio(Request $request){
        $portfolio = Portfolio::all();
        return view('admin.portfolio_page.add_portfolio_page', compact('portfolio'));
    }

    public function storePortfolio(Request $request){
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
        ]);
        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/protfolio/' . $name_gen);
            $save_url = 'upload/protfolio/'.$name_gen;
            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Portfolio Added with image Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Added Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function editPortfolio(Request $request, $id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio_page.edit_portfolio_page', compact('portfolio'));
    }

    public function updatePortfolio(Request $request, $id){
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
        ]);
        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/protfolio/' . $name_gen);
            $save_url = 'upload/protfolio/'.$name_gen;
            Portfolio::find($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Portfolio Update with image Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            Portfolio::find($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Update Successfully done!.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function deletePortfolio(Request $request, $id){
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);
        $portfolio->delete();
        $notification = array(
            'message' => 'Portfolio delete Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function portfolioDetails(Request $request, $id){
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details_page', compact('portfolio'));
    }
}
