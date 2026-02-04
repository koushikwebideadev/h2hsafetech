<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon' => 'fas fa-columns',
                'title' => 'Enterprise Dashboard',
                'short_description' => 'provides the enterprise dashboard where management user can check and see statistics and a summary of billing, recharge collection, complaints, notices etc. on drill down basis.',
                'long_description' => 'provides the enterprise dashboard where management user can check and see statistics and a summary of billing, recharge collection, complaints, notices etc. on drill down basis.',
                'order' => 1,
            ],
            [
                'icon' => 'fas fa-pen-nib',
                'title' => 'Billing Dashboard',
                'short_description' => 'On Billing dashboard the facility team can check outstanding amount, recharge collection, unit summary with bill plan.',
                'long_description' => 'On Billing dashboard the facility team can check outstanding amount, recharge collection, unit summary with bill plan.',
                'order' => 2,
            ],
            [
                'icon' => 'fas fa-file-pdf',
                'title' => 'Customized Report',
                'short_description' => 'The Facility team is able to take billing, recharge, unit summary report as per requirement in excel format as well as in pdf format as per bill plan and billing cycle.',
                'long_description' => 'The Facility team is able to take billing, recharge, unit summary report as per requirement in excel format as well as in pdf format as per bill plan and billing cycle.',
                'order' => 3,
            ],
            [
                'icon' => 'fas fa-calendar-check',
                'title' => 'Online Billing System',
                'short_description' => 'provide facility to generate Electricity and Maintenance bills on single click. The Occupant get notified through SMS and Email.',
                'long_description' => 'provide facility to generate Electricity and Maintenance bills on single click. The Occupant get notified through SMS and Email.',
                'order' => 4,
            ],
            [
                'icon' => 'fas fa-tools',
                'title' => 'Complaint Management',
                'short_description' => 'provide online Complaint Management System where user can log complaint through Mobile App or WebPortal or through Message.',
                'long_description' => 'provide online Complaint Management System where user can log complaint through Mobile App or WebPortal or through Message.',
                'order' => 5,
            ],
            [
                'icon' => 'fas fa-th-large',
                'title' => 'Dashboard',
                'short_description' => 'provide different dashboard according to user role. Admin can see the due payments, payment history etc. Occupant can see about payment history, Complaints etc',
                'long_description' => 'provide different dashboard according to user role. Admin can see the due payments, payment history etc. Occupant can see about payment history, Complaints etc',
                'order' => 6,
            ],
            [
                'icon' => 'fas fa-comment-dots',
                'title' => 'Automatic Alerts',
                'short_description' => 'can generate notification and alerts according to predefined rules like Bills Generated, Payment Received, Complaint Logged, Solved etc.',
                'long_description' => 'can generate notification and alerts according to predefined rules like Bills Generated, Payment Received, Complaint Logged, Solved etc.',
                'order' => 7,
            ],
            [
                'icon' => 'fas fa-piggy-bank',
                'title' => 'Accounting',
                'short_description' => 'Online accounting facilities like Journal Entry, Balance Sheet, Trial Balance, Profit & Loss Account, Bulk posting of Bill & Payment, Integration with SAP/Tally, Prepare Income & Expense Account etc.',
                'long_description' => 'Online accounting facilities like Journal Entry, Balance Sheet, Trial Balance, Profit & Loss Account, Bulk posting of Bill & Payment, Integration with SAP/Tally, Prepare Income & Expense Account etc.',
                'order' => 8,
            ],
            [
                'icon' => 'fas fa-chart-line',
                'title' => 'Data Analytics',
                'short_description' => 'can provide analytics for Payment Received against generated bills monthly and yearly, Consumption Analysis yearly, Compaints resolution Analytics.',
                'long_description' => 'can provide analytics for Payment Received against generated bills monthly and yearly, Consumption Analysis yearly, Compaints resolution Analytics.',
                'order' => 9,
            ],
            [
                'icon' => 'fas fa-chalkboard',
                'title' => 'Notice Boards',
                'short_description' => 'Admin can flash notices through Email, SMS to all Occupant, to specific Tower, or to a single Occupant. Notice will be visible to the Occupants meant for the purpose.',
                'long_description' => 'Admin can flash notices through Email, SMS to all Occupant, to specific Tower, or to a single Occupant. Notice will be visible to the Occupants meant for the purpose.',
                'order' => 10,
            ],
            [
                'icon' => 'fas fa-lightbulb',
                'title' => 'Personalization',
                'short_description' => 'Customization as per your needs – Messages/ Alerts etc. Get your Society App both for Android and iPhone.',
                'long_description' => 'Customization as per your needs – Messages/ Alerts etc. Get your Society App both for Android and iPhone.',
                'order' => 11,
            ],
            [
                'icon' => 'fas fa-edit',
                'title' => 'Survey/Poll',
                'short_description' => 'Create Survey/Poll and take the feedback from the customer, survey/poll will visible to the Occupant when the facility team activated or launched, take report of each survey/poll.',
                'long_description' => 'Create Survey/Poll and take the feedback from the customer, survey/poll will visible to the Occupant when the facility team activated or launched, take report of each survey/poll.',
                'order' => 12,
            ],
            [
                'icon' => 'fas fa-clock',
                'title' => 'PPM',
                'short_description' => 'Schedule the task as per your assets or equipments timeline, get notification before and after task completion according to your configuration.',
                'long_description' => 'Schedule the task as per your assets or equipments timeline, get notification before and after task completion according to your configuration.',
                'order' => 13,
            ],
            [
                'icon' => 'fas fa-project-diagram',
                'title' => 'Inventory',
                'short_description' => 'Facility team can manage sales order and purchase order of the society.',
                'long_description' => 'Facility team can manage sales order and purchase order of the society.',
                'order' => 14,
            ],
            [
                'icon' => 'fas fa-fingerprint',
                'title' => 'Staff Attendance',
                'short_description' => 'The Security guard is able to manage staff/maid attendance, Occupants will get notification on his mobile app.',
                'long_description' => 'The Security guard is able to manage staff/maid attendance, Occupants will get notification on his mobile app.',
                'order' => 15,
            ],
            [
                'icon' => 'fas fa-image',
                'title' => 'Document Repository',
                'short_description' => 'The facility team can store the Occupants mandatory documents as per requirements.',
                'long_description' => 'The facility team can store the Occupants mandatory documents as per requirements.',
                'order' => 16,
            ],
        ];

        foreach ($features as $feature) {
            \App\Models\Feature::create($feature);
        }
    }
}
