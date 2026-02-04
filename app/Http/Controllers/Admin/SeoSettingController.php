<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seoSettings = SeoSetting::all();
        return view('admin.seo-settings.index', compact('seoSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seo-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|unique:seo_settings,page_name',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->except('seo_image');

        if ($request->hasFile('seo_image')) {
            $file = $request->file('seo_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/seo'), $filename);
            $input['seo_image'] = 'assets/images/seo/' . $filename;
        }

        SeoSetting::create($input);

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO Settings created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeoSetting $seoSetting)
    {
        return view('admin.seo-settings.edit', compact('seoSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeoSetting $seoSetting)
    {
        $request->validate([
            'page_name' => 'required|unique:seo_settings,page_name,' . $seoSetting->id,
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->except('seo_image');

        if ($request->hasFile('seo_image')) {
            $file = $request->file('seo_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/seo'), $filename);
            $input['seo_image'] = 'assets/images/seo/' . $filename;

            // Delete old image if exists
            if ($seoSetting->seo_image && file_exists(public_path($seoSetting->seo_image))) {
                unlink(public_path($seoSetting->seo_image));
            }
        }

        $seoSetting->update($input);

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeoSetting $seoSetting)
    {
        if ($seoSetting->seo_image && file_exists(public_path($seoSetting->seo_image))) {
            unlink(public_path($seoSetting->seo_image));
        }

        $seoSetting->delete();

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO Settings deleted successfully.');
    }
}
