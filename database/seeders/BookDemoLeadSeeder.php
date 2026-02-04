<?php

namespace Database\Seeders;

use App\Models\BookDemoLead;
use Illuminate\Database\Seeder;

class BookDemoLeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leads = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'mobile_no' => '+1234567890',
                'country' => 'USA',
                'preferred_mode_of_call' => 'Zoom',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'mobile_no' => '+9876543210',
                'country' => 'UK',
                'preferred_mode_of_call' => 'Skype',
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'mobile_no' => '+1122334455',
                'country' => 'Canada',
                'preferred_mode_of_call' => 'Google Meet',
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert@example.com',
                'mobile_no' => '+5566778899',
                'country' => 'Australia',
                'preferred_mode_of_call' => 'WhatsApp',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@example.com',
                'mobile_no' => '+9988776655',
                'country' => 'India',
                'preferred_mode_of_call' => 'MS Teams',
            ],
            [
                'name' => 'Michael Wilson',
                'email' => 'michael@example.com',
                'mobile_no' => '+6677889900',
                'country' => 'Germany',
                'preferred_mode_of_call' => 'Zoom',
            ],
            [
                'name' => 'Sarah Miller',
                'email' => 'sarah@example.com',
                'mobile_no' => '+4433221100',
                'country' => 'France',
                'preferred_mode_of_call' => 'Skype',
            ],
            [
                'name' => 'David Taylor',
                'email' => 'david@example.com',
                'mobile_no' => '+5544332211',
                'country' => 'New Zealand',
                'preferred_mode_of_call' => 'Google Meet',
            ],
            [
                'name' => 'Laura Anderson',
                'email' => 'laura@example.com',
                'mobile_no' => '+7788990011',
                'country' => 'South Africa',
                'preferred_mode_of_call' => 'WhatsApp',
            ],
            [
                'name' => 'James Thomas',
                'email' => 'james@example.com',
                'mobile_no' => '+1231231234',
                'country' => 'Ireland',
                'preferred_mode_of_call' => 'MS Teams',
            ],
        ];

        foreach ($leads as $lead) {
            BookDemoLead::create($lead);
        }
    }
}
