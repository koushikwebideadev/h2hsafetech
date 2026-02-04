<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactLead;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Cleanup existing demo data
        Blog::query()->delete();
        ContactLead::query()->delete();

        // 1. Create Blog Categories if none exist
        $categories = ['Technology', 'Banking', 'Society Management', 'Events', 'Updates'];
        $categoryIds = [];

        foreach ($categories as $catName) {
            $category = BlogCategory::updateOrCreate(
                ['slug' => Str::slug($catName)],
                ['name' => $catName]
            );
            $categoryIds[] = $category->id;
        }

        // 2. Add 10 Demo Blogs
        for ($i = 1; $i <= 10; $i++) {
            $title = "Demo Blog Post " . $i . ": " . $this->getBlogTopic($i);
            Blog::create([
                'title' => $title,
                'slug' => Str::slug($title . '-' . uniqid()),
                'short_description' => "This is a short description for demo blog post " . $i . ". It provides a brief overview of the topics discussed in this post.",
                'long_description' => "<p>This is the long description for <strong>" . $title . "</strong>.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>",
                'blog_category_id' => $categoryIds[array_rand($categoryIds)],
                'tags' => 'demo, society, banking, update',
                'is_active' => true,
                'meta_title' => $title,
                'meta_description' => "SEO description for demo blog " . $i,
            ]);
        }

        // 3. Add 10 Contact Leads
        $statuses = ['new', 'contacted', 'resolved'];
        for ($i = 1; $i <= 10; $i++) {
            ContactLead::create([
                'name' => "John Doe " . $i,
                'email' => "john.doe" . $i . "@example.com",
                'phone' => "987654321" . ($i % 10),
                'subject' => "Inquiry from Demo Lead " . $i,
                'message' => "This is a demo message from lead " . $i . ". I am interested in learning more about your society management solutions.",
                'status' => $statuses[array_rand($statuses)]
            ]);
        }
    }

    private function getBlogTopic($i)
    {
        $topics = [
            "Future of Digital Banking",
            "Society Management Tips",
            "Security in Online Payments",
            "Community Building in Societies",
            "TJSB Bank's New Features",
            "How to use BBPS for Bills",
            "Managing Society Accounts",
            "Importance of Data Privacy",
            "The Rise of Smart Cities",
            "Financial Literacy for Residents"
        ];
        return $topics[($i - 1) % count($topics)];
    }
}
