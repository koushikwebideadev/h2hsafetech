<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image' => 'nullable|image|max:2048',
            'meta_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imageName = time() . '_blog_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            $imageName = time() . '_meta_' . $request->file('meta_image')->getClientOriginalName();
            $request->file('meta_image')->move(public_path('assets/images/blogs'), $imageName);
            $data['meta_image'] = $imageName;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image' => 'nullable|image|max:2048',
            'meta_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('assets/images/blogs/' . $blog->image))) {
                unlink(public_path('assets/images/blogs/' . $blog->image));
            }
            $imageName = time() . '_blog_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            if ($blog->meta_image && file_exists(public_path('assets/images/blogs/' . $blog->meta_image))) {
                unlink(public_path('assets/images/blogs/' . $blog->meta_image));
            }
            $imageName = time() . '_meta_' . $request->file('meta_image')->getClientOriginalName();
            $request->file('meta_image')->move(public_path('assets/images/blogs'), $imageName);
            $data['meta_image'] = $imageName;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path('assets/images/blogs/' . $blog->image))) {
            unlink(public_path('assets/images/blogs/' . $blog->image));
        }
        if ($blog->meta_image && file_exists(public_path('assets/images/blogs/' . $blog->meta_image))) {
            unlink(public_path('assets/images/blogs/' . $blog->meta_image));
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
