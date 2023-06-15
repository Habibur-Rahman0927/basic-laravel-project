<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    //
    public function allBlogCategory(Request $request){
        $allBlogCategory = BlogCategory::all();
        return view('admin.blog_category.all_blog_category', compact('allBlogCategory'));
    }

    public function addBlogCategory(Request $request){
        return view('admin.blog_category.add_blog_category');
    }
    
    public function storeBlogCategory(Request $request){
        $request->validate([
            'blog_category' => 'required',
        ]);
        
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    
    public function editBlogCategory(Request $request, $id){
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category', compact('blogCategory'));
    }
    public function updateBlogCategory(Request $request, $id){
        $request->validate([
            'blog_category' => 'required',
        ]);
        
        BlogCategory::find($id)->update([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    
    public function deleteBlogCategory(Request $request, $id){
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio delete Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    
}
