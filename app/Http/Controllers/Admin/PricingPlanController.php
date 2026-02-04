<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use App\Models\PricingFeature;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::with('features')->ordered()->get();
        return view('admin.pricing-plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pricing-plans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:pricing_plans,slug',
            'badge_color' => 'nullable|string',
            'button_color' => 'nullable|string',
            'button_text' => 'required|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        PricingPlan::create($validated);

        return redirect()->route('admin.pricing-plans.index')
            ->with('success', 'Pricing plan created successfully.');
    }

    public function edit(PricingPlan $pricingPlan)
    {
        $pricingPlan->load('features');
        return view('admin.pricing-plans.edit', compact('pricingPlan'));
    }

    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:pricing_plans,slug,' . $pricingPlan->id,
            'badge_color' => 'nullable|string',
            'button_color' => 'nullable|string',
            'button_text' => 'required|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
            'features' => 'array',
            'features.*.feature_name' => 'required|string',
            'features.*.is_included' => 'boolean',
            'features.*.sort_order' => 'required|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $pricingPlan->update($validated);

        // Update features
        if ($request->has('features')) {
            $pricingPlan->features()->delete();

            foreach ($request->features as $featureData) {
                PricingFeature::create([
                    'pricing_plan_id' => $pricingPlan->id,
                    'feature_name' => $featureData['feature_name'],
                    'is_included' => isset($featureData['is_included']) ? true : false,
                    'sort_order' => $featureData['sort_order'],
                ]);
            }
        }

        return redirect()->route('admin.pricing-plans.index')
            ->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();

        return redirect()->route('admin.pricing-plans.index')
            ->with('success', 'Pricing plan deleted successfully.');
    }
}
