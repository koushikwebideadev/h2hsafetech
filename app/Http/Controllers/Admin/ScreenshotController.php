<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScreenshotController extends Controller
{
    public function index()
    {
        $screenshots = Screenshot::orderBy('order')->get();
        return view('admin.screenshots.index', compact('screenshots'));
    }

    public function create()
    {
        return view('admin.screenshots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['alt_text', 'order']);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/screenshots'), $imageName);
            $data['image_path'] = 'uploads/screenshots/' . $imageName;
        }

        Screenshot::create($data);

        return redirect()->route('admin.screenshots.index')->with('success', 'Screenshot added successfully.');
    }

    public function edit(Screenshot $screenshot)
    {
        return view('admin.screenshots.edit', compact('screenshot'));
    }

    public function update(Request $request, Screenshot $screenshot)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['alt_text', 'order']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($screenshot->image_path && File::exists(public_path($screenshot->image_path))) {
                File::delete(public_path($screenshot->image_path));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/screenshots'), $imageName);
            $data['image_path'] = 'uploads/screenshots/' . $imageName;
        }

        $screenshot->update($data);

        return redirect()->route('admin.screenshots.index')->with('success', 'Screenshot updated successfully.');
    }

    public function destroy(Screenshot $screenshot)
    {
        if ($screenshot->image_path && File::exists(public_path($screenshot->image_path))) {
            File::delete(public_path($screenshot->image_path));
        }

        $screenshot->delete();
        return redirect()->route('admin.screenshots.index')->with('success', 'Screenshot deleted successfully.');
    }
}
