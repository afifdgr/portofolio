<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function allBlogCategory()
    {
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategories'));
    }

    public function addBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function storeBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category' => 'required',

        ], [
            'blog_category.required' => 'Blog Category Name is Required',

        ]);

        BlogCategory::create([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Name Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function editBlogCategory($id)
    {
        $blogCategories = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogCategories'));
    }

    public function updateBlogCategory(Request $request)
    {
        $blogCategory_id = $request->id;

        BlogCategory::findOrFail($blogCategory_id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Name Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function deleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
