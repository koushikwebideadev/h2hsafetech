<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomPageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.custom-pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.custom-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'content' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->title);
        } else {
            $data['slug'] = Str::slug($request->slug);
        }

        Page::create($data);

        return redirect()->route('admin.custom-pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $customPage)
    {
        return view('admin.custom-pages.edit', compact('customPage'));
    }

    public function update(Request $request, Page $customPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $customPage->id,
            'content' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);

        $customPage->update($data);

        return redirect()->route('admin.custom-pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $customPage)
    {
        $customPage->delete();
        return redirect()->route('admin.custom-pages.index')->with('success', 'Page deleted successfully.');
    }
}
