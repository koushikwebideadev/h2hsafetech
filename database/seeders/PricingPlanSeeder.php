<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
use App\Models\PricingFeature;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all features
        $features = [
            'Society Data Management',
            'Community Collaboration',
            'Society Help Desk',
            'Apartment Security',
            'Facility Management',
            'Society Accounting',
        ];

        // Define plans with their feature availability
        $plans = [
            [
                'name' => 'FREE',
                'slug' => 'free',
                'badge_color' => 'bg-free',
                'button_color' => 'btn-success bg-free border-0',
                'button_text' => 'Get Started Now',
                'sort_order' => 1,
                'features' => [
                    'Society Data Management' => true,
                    'Community Collaboration' => true,
                    'Society Help Desk' => true,
                    'Apartment Security' => false,
                    'Facility Management' => false,
                    'Society Accounting' => false,
                ],
            ],
            [
                'name' => 'STANDARD<br>SECURITY',
                'slug' => 'standard-security',
                'badge_color' => 'bg-security',
                'button_color' => 'btn-warning bg-security border-0 text-white',
                'button_text' => 'Get Started Now',
                'sort_order' => 2,
                'features' => [
                    'Society Data Management' => true,
                    'Community Collaboration' => true,
                    'Society Help Desk' => true,
                    'Apartment Security' => true,
                    'Facility Management' => false,
                    'Society Accounting' => false,
                ],
            ],
            [
                'name' => 'STANDARD<br>MANAGEMENT',
                'slug' => 'standard-management',
                'badge_color' => 'bg-management',
                'button_color' => 'btn-primary bg-management border-0',
                'button_text' => 'Get Started Now',
                'sort_order' => 3,
                'features' => [
                    'Society Data Management' => true,
                    'Community Collaboration' => true,
                    'Society Help Desk' => true,
                    'Apartment Security' => true,
                    'Facility Management' => true,
                    'Society Accounting' => false,
                ],
            ],
            [
                'name' => 'STANDARD<br>ACCOUNTING',
                'slug' => 'standard-accounting',
                'badge_color' => 'bg-accounting',
                'button_color' => 'btn-warning bg-accounting border-0 text-white',
                'button_text' => 'Get Started Now',
                'sort_order' => 4,
                'features' => [
                    'Society Data Management' => true,
                    'Community Collaboration' => true,
                    'Society Help Desk' => true,
                    'Apartment Security' => false,
                    'Facility Management' => false,
                    'Society Accounting' => true,
                ],
            ],
            [
                'name' => 'ULTIMATE',
                'slug' => 'ultimate',
                'badge_color' => 'bg-ultimate',
                'button_color' => 'btn-info bg-ultimate border-0 text-white',
                'button_text' => 'Get Started Now',
                'sort_order' => 5,
                'features' => [
                    'Society Data Management' => true,
                    'Community Collaboration' => true,
                    'Society Help Desk' => true,
                    'Apartment Security' => true,
                    'Facility Management' => true,
                    'Society Accounting' => true,
                ],
            ],
        ];

        foreach ($plans as $planData) {
            $planFeatures = $planData['features'];
            unset($planData['features']);

            $plan = PricingPlan::create($planData);

            $sortOrder = 1;
            foreach ($planFeatures as $featureName => $isIncluded) {
                PricingFeature::create([
                    'pricing_plan_id' => $plan->id,
                    'feature_name' => $featureName,
                    'is_included' => $isIncluded,
                    'sort_order' => $sortOrder++,
                ]);
            }
        }
    }
}
