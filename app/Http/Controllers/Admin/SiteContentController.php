<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::whereIn('section', ['pricing_hero', 'pricing_notes'])->get();
        return view('admin.site-contents.index', compact('contents'));
    }

    public function edit($section)
    {
        $contents = SiteContent::where('section', $section)->get();
        return view('admin.site-contents.edit', compact('contents', 'section'));
    }

    public function update(Request $request, $section)
    {
        $request->validate([
            'content.*' => 'required',
        ]);

        foreach ($request->input('content', []) as $key => $content) {
            $siteContent = SiteContent::where('section', $section)->where('key', $key)->first();
            if ($siteContent) {
                $siteContent->update(['content' => $content]);
            }
        }

        return redirect()->route('admin.site-contents.index')->with('success', 'Content updated successfully.');
    }
}
