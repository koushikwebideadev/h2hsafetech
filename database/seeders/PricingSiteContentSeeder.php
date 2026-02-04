<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if pricing content already exists to avoid duplicates
        $existingHeroTitle = \App\Models\SiteContent::where('section', 'pricing_hero')
            ->where('key', 'title')
            ->first();
        
        if (!$existingHeroTitle) {
            \App\Models\SiteContent::create([
                'section' => 'pricing_hero',
                'key' => 'title',
                'content' => '<p>Time is Money. Let us save you both.</p>',
                'type' => 'text',
            ]);
        }
        
        $existingHeroSubtitle = \App\Models\SiteContent::where('section', 'pricing_hero')
            ->where('key', 'subtitle')
            ->first();
        
        if (!$existingHeroSubtitle) {
            \App\Models\SiteContent::create([
                'section' => 'pricing_hero',
                'key' => 'subtitle',
                'content' => '<p>Multiple plans that suits Apartment Complex of every size.</p>',
                'type' => 'text',
            ]);
        }
        
        $existingHeroDescription = \App\Models\SiteContent::where('section', 'pricing_hero')
            ->where('key', 'description')
            ->first();
        
        if (!$existingHeroDescription) {
            \App\Models\SiteContent::create([
                'section' => 'pricing_hero',
                'key' => 'description',
                'content' => '<p>{{ ($settings[\'company_name\'] ?? \'H2Hsafetech\') }} is offered as an annual subscription with unit based Pricing. A Unit is a single flat / plot / villa / shop.</p>',
                'type' => 'text',
            ]);
        }
        
        // Add pricing notes content
        $existingNotesTitle = \App\Models\SiteContent::where('section', 'pricing_notes')
            ->where('key', 'title')
            ->first();
        
        if (!$existingNotesTitle) {
            \App\Models\SiteContent::create([
                'section' => 'pricing_notes',
                'key' => 'title',
                'content' => '<p>Note:</p>',
                'type' => 'text',
            ]);
        }
        
        $existingNotesContent = \App\Models\SiteContent::where('section', 'pricing_notes')
            ->where('key', 'content')
            ->first();
        
        if (!$existingNotesContent) {
            \App\Models\SiteContent::create([
                'section' => 'pricing_notes',
                'key' => 'content',
                'content' => '["Both Collection Gateway and Payment Gateway work with your existing bank accounts.", "Collection Gateway has zero convenience charge, whereas Payment Gateway has nominal convenience charges. To know the differences between Collection Gateway and Payment Gateway, <a href=\\"{{ route(\'contact\') }}\\">request for more details</a>.", "Price of Hardware for Apartment Security varies from city to city. <a href=\\"{{ route(\'contact\') }}\\">Request for a quote</a>.", "We reserve the right to change the editions and pricing plans without any prior notice to any one.", "All prices are exclusive of any applicable regulatory taxes."]',
                'type' => 'list',
            ]);
        }
    }
}
