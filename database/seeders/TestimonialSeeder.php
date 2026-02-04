<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Pankaj Lal',
                'position' => 'Committee Member',
                'testimonial' => 'We adopted ANACITY in August 2012. It has drastically improved our communication with residents on money matters and has also substantially improved realization of timely maintenance payment and recovery of past dues.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Major Ramesh',
                'position' => 'Joint Treasurer',
                'testimonial' => "Having used other Apartment Management software I can vouch that ANACITY is India's best Apartment Management software. The accounting module does not permit the Accountant to manipulate the accounts without the appropriate permissions being given.",
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Committee Member',
                'position' => 'Aashray Co-op Society',
                'testimonial' => 'We are using ANACITY from past 2 years and found it most perfect match for our requirements, mainly in Society Accounting. Features like bulk invoice and clarity in receipts benefitted to keep all members satisfactory in terms of their contributions and on demand reports.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Mr. Kannan V.',
                'position' => 'Committee Member',
                'testimonial' => 'Some of the key factors that went in favour of ANACITY were the ease of operating the portal, the portal is quite comprehensive for managing the day to day running of an Apartment Complex at a reasonable cost.',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }
    }
}
