<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap for search engines.
     */
    public function index(): Response
    {
        $baseUrl = rtrim(config('app.url'), '/');

        $urls = [];

        // Static pages with priority and changefreq
        $staticPages = [
            ['path' => '', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['path' => 'services', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['path' => 'features', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['path' => 'about-us', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['path' => 'pricing', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['path' => 'contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['path' => 'book-a-demo', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['path' => 'blogs', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['path' => 'documents', 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => $baseUrl . '/' . $page['path'],
                'lastmod' => now()->toW3cString(),
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority'],
            ];
        }

        // Blog posts (active only)
        $blogs = Blog::where('is_active', true)->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => $baseUrl . '/blog/' . $blog->slug,
                'lastmod' => $blog->updated_at?->toW3cString() ?? now()->toW3cString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // Custom pages (exclude slugs that match static routes)
        $reservedSlugs = ['services', 'features', 'about-us', 'pricing', 'contact', 'book-a-demo', 'blogs', 'documents', 'blog', 'admin', 'storage'];
        $pages = Page::whereNotIn('slug', $reservedSlugs)->get();
        foreach ($pages as $page) {
            $urls[] = [
                'loc' => $baseUrl . '/' . $page->slug,
                'lastmod' => $page->updated_at?->toW3cString() ?? now()->toW3cString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $xml = $this->buildXml($urls);

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    /**
     * Build XML sitemap string.
     */
    private function buildXml(array $urls): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . ($url['lastmod'] ?? now()->toW3cString()) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
