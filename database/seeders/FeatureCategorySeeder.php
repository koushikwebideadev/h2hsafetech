<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeatureCategory;

class FeatureCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Society Share',
                'slug' => 'society-share',
                'tab_order' => 1,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-house-chimney', 'title' => 'My Home', 'description' => 'All Information of Login member stored at one place!!', 'order' => 1],
                    ['icon' => 'fas fa-bullhorn', 'title' => 'Notice', 'description' => 'Add online Notices here to reach everyone!!', 'order' => 2],
                    ['icon' => 'fas fa-calendar-check', 'title' => 'Events', 'description' => 'All members will get instant access to Events!!', 'order' => 3],
                    ['icon' => 'fas fa-square-poll-vertical', 'title' => 'Poll', 'description' => 'Conduct online voting for any topics, issues or elections!!', 'order' => 4],
                    ['icon' => 'fas fa-rectangle-ad', 'title' => 'Classified', 'description' => 'Buy, Sale and Advertise Classifieds!!', 'order' => 5],
                ],
            ],
            [
                'title' => 'Data Management',
                'slug' => 'data-management',
                'tab_order' => 2,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-comment-dots', 'title' => 'Complaint Box', 'description' => 'Unsatisfactory statements collection at one place!!', 'order' => 1],
                    ['icon' => 'fas fa-folder-open', 'title' => 'Document Repository', 'description' => 'Repository of all Admin, User and Common Documents!!', 'order' => 2],
                    ['icon' => 'fas fa-users-gear', 'title' => 'User Management', 'description' => 'Find out member information instantly!!', 'order' => 3],
                    ['icon' => 'fas fa-address-book', 'title' => 'Member Contact List', 'description' => 'Maintain contacts for everyone in society!!', 'order' => 4],
                    ['icon' => 'fas fa-users-viewfinder', 'title' => 'Committee Member List', 'description' => 'Maintain committee list for everyone in society!!', 'order' => 5],
                    ['icon' => 'fas fa-key', 'title' => 'Tenant Register', 'description' => 'Storage of Tenant information!!', 'order' => 6],
                    ['icon' => 'fas fa-car', 'title' => 'Parking Register', 'description' => 'Park your vehicle in your parking space only!!', 'order' => 7],
                    ['icon' => 'fas fa-scale-balanced', 'title' => 'Rules and Procedures', 'description' => 'Society Rules ,Procedures and by law!!', 'order' => 8],
                ],
            ],
            [
                'title' => 'Accounting',
                'slug' => 'accounting',
                'tab_order' => 3,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-coins', 'title' => 'Income Tracker', 'description' => 'Income of member and non-member!!', 'order' => 1],
                    ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'Expense Tracker', 'description' => 'Check your society spending!!', 'order' => 2],
                    ['icon' => 'fas fa-building-columns', 'title' => 'Bank & Cash Book', 'description' => 'Find out member information instantly!!', 'order' => 3],
                    ['icon' => 'fas fa-receipt', 'title' => 'Auto Bill Generation', 'description' => 'Automatically Generate bill of all members!!', 'order' => 4],
                    ['icon' => 'fas fa-calculator', 'title' => 'Auto Penalty Calculation', 'description' => 'Find out member information instantly!!', 'order' => 5],
                    ['icon' => 'fas fa-bell', 'title' => 'Payment Reminders', 'description' => 'Remind members by E-mail / SMS!!', 'order' => 6],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Income Expenditure Report', 'description' => 'Financial Information about Income and Expenses!!', 'order' => 7],
                    ['icon' => 'fas fa-book-bookmark', 'title' => 'All Bye-laws report', 'description' => 'Rule or law established by an organization to regulate itself', 'order' => 8],
                ],
            ],
            [
                'title' => 'Email / SMS Alert',
                'slug' => 'email-sms-alert',
                'tab_order' => 4,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-envelope-open-text', 'title' => 'Email / SMS Alert', 'description' => 'Get alerts of society activity and payments!!', 'order' => 1],
                ],
            ],
            [
                'title' => 'Payment Gateway',
                'slug' => 'payment-gateway',
                'tab_order' => 5,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-credit-card', 'title' => 'Payment Gateway', 'description' => 'Pay Bill Online and reduce efforts!!', 'order' => 1],
                ],
            ],
            [
                'title' => 'Support',
                'slug' => 'support',
                'tab_order' => 6,
                'is_active' => true,
                'items' => [
                    ['icon' => 'fas fa-headset', 'title' => 'Premium Support', 'description' => 'Get your query solved within a minute!!', 'order' => 1],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $items = $categoryData['items'];
            unset($categoryData['items']);

            $category = FeatureCategory::create($categoryData);

            foreach ($items as $item) {
                $category->items()->create([
                    'icon' => $item['icon'],
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'item_order' => $item['order'],
                ]);
            }
        }
    }
}
