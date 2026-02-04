<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function editHome()
    {
        $contents = SiteContent::where('section', 'hero')
            ->orWhere('section', 'enterprise_dashboard')
            ->get()
            ->groupBy('section');

        return view('admin.pages.home', compact('contents'));
    }

    public function updateHome(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $value) {
            if ($key === '_token')
                continue;

            // Handle image uploads
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('public/site_assets');
                $contentVal = str_replace('public/', 'storage/', $path);
                SiteContent::where('key', $key)->update(['content' => $contentVal]);
                continue;
            }

            // Decode entities to handle double-encoding (e.g., &amp;amp; -> &amp;)
            $valToDecode = is_array($value) ? json_encode($value) : $value;
            $value = html_entity_decode((string) $valToDecode, ENT_QUOTES | ENT_HTML5);

            // Clean title fields (remove <p> tags usually added by editors)
            if (str_contains($key, 'title')) {
                $value = strip_tags($value, '<br><b><i><u>');
            }

            // Handle normal text
            SiteContent::where('key', $key)->update(['content' => $value]);
        }

        return back()->with('success', 'Homepage updated successfully!');
    }

    public function editAboutUs()
    {
        return view('admin.pages.about-us');
    }

    public function updateAboutUs(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $value) {
            if ($key === '_token')
                continue;

            // Handle image uploads
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('public/site_assets');
                $contentVal = str_replace('public/', 'storage/', $path);
                SiteContent::updateOrCreate(['key' => $key], ['content' => $contentVal]);
                continue;
            }

            // Decode entities to handle double-encoding (e.g., &amp;amp; -> &amp;)
            $valToDecode = is_array($value) ? json_encode($value) : $value;
            $value = html_entity_decode((string) $valToDecode, ENT_QUOTES | ENT_HTML5);

            // Clean title fields (remove <p> tags usually added by editors)
            if (str_contains($key, 'title') || str_contains($key, 'heading')) {
                $value = strip_tags($value, '<br><b><i><u>');
            }

            // Handle normal text
            SiteContent::updateOrCreate(['key' => $key], ['content' => $value]);
        }

        return back()->with('success', 'About Us page updated successfully!');
    }
}
