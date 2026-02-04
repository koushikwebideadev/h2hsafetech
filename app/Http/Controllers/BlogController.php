<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->where('is_active', true);

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $blogs = $query->latest()->paginate(9);
        $categories = BlogCategory::withCount([
            'blogs' => function ($q) {
                $q->where('is_active', true);
            }
        ])->get();

        return view('blogs.index', compact('blogs', 'categories'));
    }

    public function show($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $recent_blogs = Blog::where('id', '!=', $blog->id)->where('is_active', true)->latest()->take(3)->get();

        return view('blogs.show', compact('blog', 'recent_blogs'));
    }
}
