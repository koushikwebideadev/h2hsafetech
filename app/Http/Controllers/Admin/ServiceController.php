<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tab_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('image', 'items');
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        }

        $service = Service::create($data);

        // Handle service items
        if ($request->has('items')) {
            foreach ($request->items as $item) {
                if (!empty($item['title'])) {
                    $service->items()->create([
                        'title' => $item['title'],
                        'column_number' => $item['column_number'] ?? 1,
                        'item_order' => $item['item_order'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service->load('items');
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tab_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('image', 'items');
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path('assets/images/' . $service->image))) {
                unlink(public_path('assets/images/' . $service->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        }

        $service->update($data);

        // Update service items - delete all and recreate
        $service->items()->delete();

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                if (!empty($item['title'])) {
                    $service->items()->create([
                        'title' => $item['title'],
                        'column_number' => $item['column_number'] ?? 1,
                        'item_order' => $item['item_order'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && file_exists(public_path('assets/images/' . $service->image))) {
            unlink(public_path('assets/images/' . $service->image));
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
