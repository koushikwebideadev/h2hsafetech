<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FeatureCategory::ordered()->withCount('items')->get();
        return view('admin.feature_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feature_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tab_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('items');
        $data['slug'] = Str::slug($request->title);

        $category = FeatureCategory::create($data);

        // Handle feature items
        if ($request->has('items')) {
            foreach ($request->items as $item) {
                if (!empty($item['title'])) {
                    $category->items()->create([
                        'icon' => $item['icon'] ?? null,
                        'title' => $item['title'],
                        'description' => $item['description'] ?? null,
                        'long_description' => $item['long_description'] ?? null,
                        'item_order' => $item['item_order'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.feature-categories.index')->with('success', 'Feature category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureCategory $featureCategory)
    {
        $featureCategory->load('items');
        return view('admin.feature_categories.edit', compact('featureCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeatureCategory $featureCategory)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tab_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('items');
        $data['slug'] = Str::slug($request->title);

        $featureCategory->update($data);

        // Update feature items - delete all and recreate
        $featureCategory->items()->delete();

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                if (!empty($item['title'])) {
                    $featureCategory->items()->create([
                        'icon' => $item['icon'] ?? null,
                        'title' => $item['title'],
                        'description' => $item['description'] ?? null,
                        'long_description' => $item['long_description'] ?? null,
                        'item_order' => $item['item_order'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.feature-categories.index')->with('success', 'Feature category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureCategory $featureCategory)
    {
        $featureCategory->delete();
        return redirect()->route('admin.feature-categories.index')->with('success', 'Feature category deleted successfully.');
    }
}
