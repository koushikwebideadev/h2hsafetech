<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutUsContent = [
            [
                'key' => 'about_heading',
                'content' => 'H2Hsafetech: Housing & Commercial',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_subheading',
                'content' => 'Management Simplified',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_lead_text',
                'content' => 'H2Hsafetech is a housing & commercial society management & accounting app introduced by TJSB Sahakari Bank Ltd (TJSB).',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_section_heading',
                'content' => 'About TJSB Bank',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_content',
                'content' => '<p>The year 1972 marked the beginning of a visionary journey with the opening of \'Thane Janata Sahakari Bank\'s\' first Bank Branch in the city of Thane. With this modest beginning in 1972 in the co-operative field, the dynamism infused by the Board of Directors, unflinching loyalties of the clientele and devotion of the staff have propelled the sound foundation of TJSB Sahakari Bank Ltd (TJSB) and has emerged as one of the leading multi-state scheduled co-operative Banks in the country.</p><p>During this momentous journey of 53 years, TJSB presently caters to the needs of society through a close network of 163 Branches spread all over the states of Maharashtra, Goa, Karnataka, Gujarat, and Madhya Pradesh.</p>',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_image',
                'content' => 'assets/images/hero-bg.png',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_badge_number',
                'content' => '52+',
                'section' => 'about_us',
            ],
            [
                'key' => 'about_badge_text',
                'content' => 'Years of Excellence',
                'section' => 'about_us',
            ],
            // Milestones
            [
                'key' => 'milestone_1_icon',
                'content' => 'fa-history',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_1_number',
                'content' => '52 Years',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_1_text',
                'content' => 'Banking Excellence',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_2_icon',
                'content' => 'fa-map-marker-alt',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_2_number',
                'content' => '163 Branches',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_2_text',
                'content' => 'Across 5 States',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_3_icon',
                'content' => 'fa-award',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_3_number',
                'content' => 'Award Winning',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_3_text',
                'content' => 'Mobile Application',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_4_icon',
                'content' => 'fa-rocket',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_4_number',
                'content' => 'Tech First',
                'section' => 'about_us',
            ],
            [
                'key' => 'milestone_4_text',
                'content' => 'Live with UPI & BBPS',
                'section' => 'about_us',
            ],
            // Digital Platform
            [
                'key' => 'digital_title',
                'content' => 'Emerging & Inclusive',
                'section' => 'about_us',
            ],
            [
                'key' => 'digital_subtitle',
                'content' => 'Digital Payments Platform',
                'section' => 'about_us',
            ],
            [
                'key' => 'digital_description',
                'content' => 'TJSB is fast marching towards being the financial destination that provides trusted and quality solutions through various digital channels:',
                'section' => 'about_us',
            ],
            [
                'key' => 'digital_image',
                'content' => 'assets/images/app-mockup.png',
                'section' => 'about_us',
            ],
            [
                'key' => 'digital_features',
                'content' => '["Debit Cards & UPI", "RTGS, NEFT & IMPS", "Internet & Mobile Banking", "Bharat Bill Payment System (BBPS)"]',
                'section' => 'about_us',
            ],
        ];

        foreach ($aboutUsContent as $content) {
            SiteContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
