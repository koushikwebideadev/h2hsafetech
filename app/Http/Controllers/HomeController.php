<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function services()
    {
        $services = Service::active()->ordered()->with('items')->get();
        return view('services', compact('services'));
    }

    public function features()
    {
        $categories = \App\Models\FeatureCategory::active()->ordered()->with('items')->get();
        return view('features', compact('categories'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function customPage($slug)
    {
        $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }
}
