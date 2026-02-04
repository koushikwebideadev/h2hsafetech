<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_name' => 'home',
                'seo_title' => 'Home - H2Hsafetech',
                'seo_description' => 'Welcome to H2Hsafetech, your partner for hassle-free society management.',
                'seo_keywords' => 'home, society management, tjsb',
            ],
            [
                'page_name' => 'about-us',
                'seo_title' => 'About Us - H2Hsafetech',
                'seo_description' => 'Learn more about H2Hsafetech and our mission.',
                'seo_keywords' => 'about us, mission, vision',
            ],
            [
                'page_name' => 'features',
                'seo_title' => 'Features - H2Hsafetech',
                'seo_description' => 'Explore the powerful features of H2Hsafetech.',
                'seo_keywords' => 'features, modules, capabilities',
            ],
            [
                'page_name' => 'services',
                'seo_title' => 'Services - H2Hsafetech',
                'seo_description' => 'Check out the services we offer to societies.',
                'seo_keywords' => 'services, banking, accounting',
            ],
            [
                'page_name' => 'blogs.index',
                'seo_title' => 'Blog - H2Hsafetech',
                'seo_description' => 'Read our latest blogs and updates.',
                'seo_keywords' => 'blog, news, updates',
            ],
            [
                'page_name' => 'book-demo.index',
                'seo_title' => 'Book a Demo - H2Hsafetech',
                'seo_description' => 'Schedule a demo to see H2Hsafetech in action.',
                'seo_keywords' => 'demo, trial, schedule',
            ],
            [
                'page_name' => 'contact',
                'seo_title' => 'Contact Us - H2Hsafetech',
                'seo_description' => 'Get in touch with us for any queries.',
                'seo_keywords' => 'contact, support, help',
            ],
        ];

        foreach ($pages as $page) {
            SeoSetting::updateOrCreate(
                ['page_name' => $page['page_name']],
                $page
            );
        }
    }
}
