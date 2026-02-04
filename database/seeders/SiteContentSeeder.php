<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // Hero Section
            [
                'section' => 'hero',
                'key' => 'hero_image',
                'content' => 'assets/images/hero-3-img.png',
                'type' => 'image',
            ],
            [
                'section' => 'hero',
                'key' => 'hero_title',
                'content' => 'Be SMARTER, DELIGHT RESIDENTS. Increase convenience and trust of Residents. Hassleless operation with minimal Human Intervention. Single Window for All Society Operations.<br>No Ads, No Noise, Only Value',
                'type' => 'text',
            ],
            [
                'section' => 'hero',
                'key' => 'hero_button_1_text',
                'content' => 'SIGNUP IT & TRY',
                'type' => 'text',
            ],
            [
                'section' => 'hero',
                'key' => 'hero_button_1_url',
                'content' => '#',
                'type' => 'text',
            ],
            [
                'section' => 'hero',
                'key' => 'hero_button_2_text',
                'content' => 'START FREE',
                'type' => 'text',
            ],
            [
                'section' => 'hero',
                'key' => 'hero_button_2_url',
                'content' => '#',
                'type' => 'text',
            ],
            // Enterprise Dashboard
            [
                'section' => 'enterprise_dashboard',
                'key' => 'enterprise_title',
                'content' => 'Enterprise Dashboard Interface',
                'type' => 'text',
            ],
            [
                'section' => 'enterprise_dashboard',
                'key' => 'enterprise_description',
                'content' => 'Single Page View for Multi Sites, excellent control over operation & maintenance',
                'type' => 'text',
            ],
            // Asset Management & PPM
            [
                'section' => 'asset_management',
                'key' => 'asset_title',
                'content' => 'Asset Management & PPM',
                'type' => 'text',
            ],
            [
                'section' => 'asset_management',
                'key' => 'asset_description',
                'content' => 'Manage Facility Assets & Operations',
                'type' => 'text',
            ],
            [
                'section' => 'asset_management',
                'key' => 'asset_image',
                'content' => 'assets/images/content-4-img.png',
                'type' => 'image',
            ],
            [
                'section' => 'asset_management',
                'key' => 'asset_features',
                'content' => json_encode([
                    'QR Based Asset Tagging',
                    'Asset Catalogue, Checklist, Maintenance History',
                    'Time Stamp & GPS Location Tagging',
                    'Net Asset Value (NAV), Depriciation',
                    'Planned Preventive Maintenance (PPM), Predective Maintenance',
                    'Automatic Work Orders, Tasks, Alerts, Approval, Escalations'
                ]),
                'type' => 'text',
            ],

            // Helpdesk / Complaint Management
            [
                'section' => 'helpdesk',
                'key' => 'helpdesk_title',
                'content' => 'Helpdesk / Complaint Management (IVR)',
                'type' => 'text',
            ],
            [
                'section' => 'helpdesk',
                'key' => 'helpdesk_description',
                'content' => 'Manage your complaints like never before! IVR enabled',
                'type' => 'text',
            ],
            [
                'section' => 'helpdesk',
                'key' => 'helpdesk_image',
                'content' => 'assets/images/content-3-1-img.png',
                'type' => 'image',
            ],
            [
                'section' => 'helpdesk',
                'key' => 'helpdesk_features',
                'content' => json_encode([
                    'Complaint get automatically assigned to the Staff based on slots and open complaints, Staff Leaves/ Work Slots configurable.',
                    'Customer can raise complaint 24*7 through Web, Mobile App and IVR (Interactive Voice Response)',
                    'Management can track their Staff Performance and take better decisions.',
                    'Complaint Escalation Levels to keep track of escalations.',
                    'Complaint Reporting Analytics , Graphs and Charts.',
                    'Automatic Job Cards and OTP for Complaint logging by staff.'
                ]),
                'type' => 'text',
            ],

            // Billing & Payment Collection
            [
                'section' => 'billing',
                'key' => 'billing_title',
                'content' => 'Billing & Payment Collection',
                'type' => 'text',
            ],
            [
                'section' => 'billing',
                'key' => 'billing_description',
                'content' => '',
                'type' => 'text',
            ],
            [
                'section' => 'billing',
                'key' => 'billing_image',
                'content' => 'assets/images/content-3-2-img.png',
                'type' => 'image',
            ],
            [
                'section' => 'billing',
                'key' => 'billing_features',
                'content' => json_encode([
                    'Automatic Payment Reminders to the Occupants.',
                    'Admin can see the Bill Preview to mitigate any wrong bill.',
                    'Tally and SAP integration to automate the posting of bills and receipts to prevent human errors and time.',
                    'Automatic Reading from your Smart Meters.',
                    'Cheque Parking and Cheque Bounce Handling.',
                    'Transfer Unit Ownership taken care with very Simple interface.',
                    'Occupants can pay their bills online.',
                    'Charge Wise Adjustment / Arrear and Advance Charge handlinge.'
                ]),
                'type' => 'text',
            ],
            // Accounting Management
            [
                'section' => 'accounting_management',
                'key' => 'accounting_title',
                'content' => 'Accounting Management',
                'type' => 'text',
            ],
            [
                'section' => 'accounting_management',
                'key' => 'accounting_description',
                'content' => '',
                'type' => 'text',
            ],
            [
                'section' => 'accounting_management',
                'key' => 'accounting_image',
                'content' => 'assets/images/content-4-img.png',
                'type' => 'image',
            ],
            [
                'section' => 'accounting_management',
                'key' => 'accounting_features',
                'content' => json_encode([
                    'Maintain your Society Accounts online and get financial Statements automatically updated.',
                    'Journal Entry Posting and General Ledger – for any Account.',
                    'Trial Balance at any point of Time.',
                    'Income and Expense Account automatically prepared.',
                    'Balance Sheet automatically prepared.',
                    'Bulk Posting of Billing & Payments.',
                    'Integration with Accounting System like SAP/ Tally.'
                ]),
                'type' => 'text',
            ],

            // Visitor Management
            [
                'section' => 'visitor_management',
                'key' => 'visitor_title',
                'content' => 'Visitor Management',
                'type' => 'text',
            ],
            [
                'section' => 'visitor_management',
                'key' => 'visitor_description',
                'content' => 'Track each visitor in the society, capture photograph and detail',
                'type' => 'text',
            ],
            [
                'section' => 'visitor_management',
                'key' => 'visitor_image_1',
                'content' => 'assets/images/vms-1.png',
                'type' => 'image',
            ],
            [
                'section' => 'visitor_management',
                'key' => 'visitor_image_2',
                'content' => 'assets/images/vms-2.png',
                'type' => 'image',
            ],
            [
                'section' => 'visitor_management',
                'key' => 'visitor_features',
                'content' => json_encode([
                    'Occupants can generate Pass / Recurring Pass for their guests with Address and Google Map Link already shared.',
                    'Automatic Visit Intimation to Occupants on each Tower/ Block.',
                    'Security guard can take Photo, Vehicle Details etc . Gets automatic Alerts for Time Exceed.',
                    'Family members can also access the Visitor Management System.',
                    'Security person can Block Visitor.',
                    'Reporting – for Visits/ Visitors – Daily Automatic Emails',
                    'Occupants in Emergency can press a simple button to intimate Security / Other Admin etc.'
                ]),
                'type' => 'text',
            ],

            // Maid Management
            [
                'section' => 'maid_management',
                'key' => 'maid_title',
                'content' => 'Maid Management - SMART Card Tracking',
                'type' => 'text',
            ],
            [
                'section' => 'maid_management',
                'key' => 'maid_description',
                'content' => 'Track Maid/Staff in the society, using Face Recognition ( AI) Smart Card (RFID) solution, Biometric & Face recognition',
                'type' => 'text',
            ],
            [
                'section' => 'maid_management',
                'key' => 'maid_image',
                'content' => 'assets/images/smart-card.jpg.jpeg',
                'type' => 'image',
            ],
            [
                'section' => 'maid_management',
                'key' => 'maid_features',
                'content' => json_encode([
                    'A physical identity, Smart Card is provided to each Maid/Driver/Etc.',
                    'Each staff detail and photo is captured into system',
                    'A device is placed at the security gate',
                    'Each staff will Punch/Touch Smart card at device or Face Based Idetification from App',
                    'Staff detail and Photo will be displayed on screen',
                    'An intimation will be send to Occupant App, Occupant can check attendance on App',
                    'System will alert security if validity expires'
                ]),
                'type' => 'text',
            ],
            // Download Links
            [
                'section' => 'download_bar',
                'key' => 'app_store_url',
                'content' => '#',
                'type' => 'text',
            ],
            [
                'section' => 'download_bar',
                'key' => 'google_play_url',
                'content' => '#',
                'type' => 'text',
            ],
        ];

        foreach ($contents as $content) {
            \App\Models\SiteContent::updateOrCreate(
                ['key' => $content['key']], // Use unique key as the identifier
                ['section' => $content['section'], 'content' => $content['content'], 'type' => $content['type']]
            );
        }
    }
}
