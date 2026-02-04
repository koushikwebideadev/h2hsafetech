<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenshotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $screenshots = [
            [
                'image_path' => 'assets/images/screen-1.jpg.jpeg',
                'alt_text' => 'Screen 1',
                'order' => 1,
            ],
            [
                'image_path' => 'assets/images/screen-2.jpg.jpeg',
                'alt_text' => 'Screen 2',
                'order' => 2,
            ],
            [
                'image_path' => 'assets/images/screen-3.jpg.jpeg',
                'alt_text' => 'Screen 3',
                'order' => 3,
            ],
            [
                'image_path' => 'assets/images/screen-4.jpg.jpeg',
                'alt_text' => 'Screen 4',
                'order' => 4,
            ],
        ];

        foreach ($screenshots as $screenshot) {
            \App\Models\Screenshot::create($screenshot);
        }
    }
}
