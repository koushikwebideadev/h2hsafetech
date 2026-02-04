<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_settings')->delete();

        $settings = [
            [
                'id' => 1,
                'type' => 'company_name',
                'value' => 'Pestiseeds Agri Logistics',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-17 01:11:54',
            ],
            [
                'id' => 2,
                'type' => 'company_phone',
                'value' => '+917318715117',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-16 01:08:05',
            ],
            [
                'id' => 3,
                'type' => 'company_email',
                'value' => 'pestiseedsagritech@gmail.com',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-16 01:08:05',
            ],
            [
                'id' => 4,
                'type' => 'company_copyright_text',
                'value' => 'CopyRight pestiseedsagritech@2026',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-16 01:08:05',
            ],
            [
                'id' => 5,
                'type' => 'currency_symbol_position',
                'value' => 'left',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-16 01:08:05',
            ],
            [
                'id' => 6,
                'type' => 'mail_config',
                'value' => '{"status":"1","driver":"SMTP","host":"smtp.hostinger.com","port":"465","encryption":"tls","username":"info@app.pestiseedsagritech.com","password":"Admin!@#$54321","email_id":"info@app.pestiseedsagritech.com","name":"Pestiseeds Agri Logistics"}',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-24 08:25:17',
            ],
            [
                'id' => 7,
                'type' => 'whatsapp',
                'value' => '{"status":"1","phone":"+917318715117"}',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-24 08:25:28',
            ],

            [
                'id' => 9,
                'type' => 'system_default_currency',
                'value' => '3',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-16 01:08:05',
            ],
            [
                'id' => 10,
                'type' => 'company_web_logo',
                'value' => '{"image_name":"2026-01-26-697768e8d5c5e.jpeg","storage":"public"}',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-26 07:45:20',
            ],
            [
                'id' => 11,
                'type' => 'company_footer_logo',
                'value' => '{"image_name":"2026-01-26-697768b2df249.png","storage":"public"}',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-26 07:44:26',
            ],
            [
                'id' => 12,
                'type' => 'company_fav_icon',
                'value' => '{"image_name":"2026-01-26-697768b2e5c96.png","storage":"public"}',
                'created_at' => '2026-01-16 01:08:05',
                'updated_at' => '2026-01-26 07:44:26',
            ],
        ];

        DB::table('business_settings')->insert($settings);
    }
}
