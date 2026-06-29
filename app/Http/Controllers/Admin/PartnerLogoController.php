<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerLogoController extends Controller
{
    public function index()
    {
        $partnerLogos = PartnerLogo::with('page')->orderBy('sort_order')->get();

        return view('admin.partner-logos.index', compact('partnerLogos'));
    }

    public function create()
    {
        $pages = Page::orderBy('title')->get();

        return view('admin.partner-logos.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'link_type' => 'required|in:none,external,page',
            'external_url' => 'required_if:link_type,external|nullable|url|max:500',
            'page_id' => 'required_if:link_type,page|nullable|exists:pages,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $this->prepareData($validated, $request);

        if ($request->hasFile('image')) {
            $uploadDir = public_path('uploads/partner-logos');
            if (! File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($uploadDir, $imageName);
            $data['image'] = 'uploads/partner-logos/' . $imageName;
        }

        PartnerLogo::create($data);

        return redirect()->route('admin.partner-logos.index')->with('success', 'Partner logo added successfully.');
    }

    public function edit(PartnerLogo $partnerLogo)
    {
        $pages = Page::orderBy('title')->get();

        return view('admin.partner-logos.edit', compact('partnerLogo', 'pages'));
    }

    public function update(Request $request, PartnerLogo $partnerLogo)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'link_type' => 'required|in:none,external,page',
            'external_url' => 'required_if:link_type,external|nullable|url|max:500',
            'page_id' => 'required_if:link_type,page|nullable|exists:pages,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $this->prepareData($validated, $request);

        if ($request->hasFile('image')) {
            if ($partnerLogo->image && File::exists(public_path($partnerLogo->image))) {
                File::delete(public_path($partnerLogo->image));
            }

            $uploadDir = public_path('uploads/partner-logos');
            if (! File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($uploadDir, $imageName);
            $data['image'] = 'uploads/partner-logos/' . $imageName;
        }

        $partnerLogo->update($data);

        return redirect()->route('admin.partner-logos.index')->with('success', 'Partner logo updated successfully.');
    }

    public function destroy(PartnerLogo $partnerLogo)
    {
        if ($partnerLogo->image && File::exists(public_path($partnerLogo->image))) {
            File::delete(public_path($partnerLogo->image));
        }

        $partnerLogo->delete();

        return redirect()->route('admin.partner-logos.index')->with('success', 'Partner logo deleted successfully.');
    }

    private function prepareData(array $validated, Request $request): array
    {
        $data = [
            'title' => $validated['title'] ?? null,
            'link_type' => $validated['link_type'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ];

        if ($validated['link_type'] === 'external') {
            $data['external_url'] = $validated['external_url'];
            $data['page_id'] = null;
        } elseif ($validated['link_type'] === 'page') {
            $data['page_id'] = $validated['page_id'];
            $data['external_url'] = null;
        } else {
            $data['external_url'] = null;
            $data['page_id'] = null;
        }

        return $data;
    }
}
