<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Managerial Services',
                'slug' => 'managerial-services',
                'icon' => 'fas fa-gears',
                'short_description' => 'Perform your societies day-to-day activities in a professional and efficient way. Society Plus managerial services undertake all tasks right from receipts creation to coordination for annual general meeting and special general meeting. Our consultants are well versed with legal, housekeeping, accounting, and managerial procedures involved and are directly under the control of societies.',
                'image' => 'service_managerial_demo.png',
                'tab_order' => 1,
                'is_active' => true,
                'items' => [
                    ['title' => 'Preparation of receipts and vouchers', 'column' => 1, 'order' => 1],
                    ['title' => 'Bank cheque deposits and withdrawal', 'column' => 1, 'order' => 2],
                    ['title' => 'Monthly payment schedules', 'column' => 1, 'order' => 3],
                    ['title' => 'Payment dispatch for vendors', 'column' => 1, 'order' => 4],
                    ['title' => 'Review of correspondence and replies', 'column' => 1, 'order' => 5],
                    ['title' => 'Resolving maintenance issues of members', 'column' => 2, 'order' => 1],
                    ['title' => 'Arranging monthly managing committee meetings', 'column' => 2, 'order' => 2],
                    ['title' => 'Arranging AGM and SGM of societies', 'column' => 2, 'order' => 3],
                    ['title' => 'Co-ordination with auditors and vendors', 'column' => 2, 'order' => 4],
                    ['title' => 'Preparation of quarterly bills and reports for societies', 'column' => 2, 'order' => 5],
                ],
            ],
            [
                'title' => 'Accounts and Audits',
                'slug' => 'accounts-and-audits',
                'icon' => 'fas fa-calculator',
                'short_description' => 'We provide end-to-end accounting and audit services for housing societies, commercial societies, maintenance societies and townships. Right from data entry to financial report generation, our team of professional accountants, legal advisors, and managers help you streamline your processes and keep you in line with statutory audit requirements.',
                'image' => 'service_accounting_demo.png',
                'tab_order' => 2,
                'is_active' => true,
                'items' => [
                    ['title' => 'Creation and maintenance of receipts and payments A/C.', 'column' => 1, 'order' => 1],
                    ['title' => 'Creation and maintenance of income and expenditure A/C.', 'column' => 1, 'order' => 2],
                    ['title' => 'Annual balance sheet.', 'column' => 1, 'order' => 3],
                    ['title' => 'Cash book, bank book and J.V reports.', 'column' => 1, 'order' => 4],
                    ['title' => 'Quarterly/Half yearly and yearly demand bills.', 'column' => 1, 'order' => 5],
                    ['title' => 'Financial report generation', 'column' => 2, 'order' => 1],
                    ['title' => 'Keep all the necessary registers and records required by the Co-operative Societies Act and Rules and bye-laws of the society.', 'column' => 2, 'order' => 2],
                    ['title' => 'All information stored at one place, Unlimited Storage available.', 'column' => 2, 'order' => 3],
                    ['title' => 'Detection of fraud relating to expenses, purchases, property and stores of the society.', 'column' => 2, 'order' => 4],
                ],
            ],
            [
                'title' => 'Registration and Formation',
                'slug' => 'registration-and-formation',
                'icon' => 'fas fa-file-invoice',
                'short_description' => 'We provide registration and formation services which help you at every step of society formation, right from inception to final handover. We look after all the legal complications involved in society formation and carry out necessary negotiations with developers. Our 25+ years of experienced team can help you with the complete process without any hassle.',
                'image' => 'service_registration_demo.png',
                'tab_order' => 3,
                'is_active' => true,
                'items' => [
                    ['title' => 'Initial screening', 'column' => 1, 'order' => 1],
                    ['title' => 'Gap identification and ratification', 'column' => 1, 'order' => 2],
                    ['title' => 'Process documentation and finalization', 'column' => 1, 'order' => 3],
                    ['title' => 'Dispute resolution', 'column' => 1, 'order' => 4],
                    ['title' => 'Society name reservation at respective co-operative departments', 'column' => 2, 'order' => 1],
                    ['title' => 'Account formation and legal documentation', 'column' => 2, 'order' => 2],
                    ['title' => 'Society formation and handover', 'column' => 2, 'order' => 3],
                ],
            ],
            [
                'title' => 'Society Conveyance',
                'slug' => 'society-conveyance',
                'icon' => 'fas fa-key',
                'short_description' => 'Does your society have ownership of the land? Are all the rights of your developer handed over?',
                'long_description' => 'These are some questions which when asked, societies will not have an answer to. In most of the cases people believe that a Purchase Agreement is the final document they need to own. However, a mere purchase agreement does not pass on the developer\'s rights on the land to the society. Societies need to make sure they have the complete right to the land, and mere society registration and formation does not provide those rights.',
                'image' => 'service_conveyance_demo.png',
                'tab_order' => 4,
                'is_active' => true,
                'items' => [
                    ['title' => 'A Conveyance Deed helps societies to gain the right of their land', 'column' => 1, 'order' => 1],
                    ['title' => 'Post this builder relinquishes his legal right on the land.', 'column' => 1, 'order' => 2],
                    ['title' => 'We provide end-to-end conveyance services to societies including execution of Conveyance Deed, Deemed Conveyance, and Deed of Apartments.', 'column' => 1, 'order' => 3],
                    ['title' => 'We work closely with co-operative societies and government officials and make sure the complete process is hassle free.', 'column' => 2, 'order' => 1],
                    ['title' => 'Our team of legal advisors and professional approach we have delivered conveyance deeds', 'column' => 2, 'order' => 2],
                    ['title' => 'We guide our clients through the complete process of transferring builder\'s rights, allocation of additional space and finally establishment of society rights, as per the law.', 'column' => 2, 'order' => 3],
                ],
            ],
            [
                'title' => 'Consultancy',
                'slug' => 'consultancy',
                'icon' => 'fas fa-user-tie',
                'short_description' => 'Proper functioning and efficient management systems in a society need to outline some ground rules. Every society needs a contingency plan for repairs, day-to-day maintenance, etc. Apart from these they also need to set rules regarding tenants, parking issues, disputes, and many more issues. Society Plus guides societies to identify all these hassles and helps with initial administrative and monetary set up of societies.',
                'image' => 'service_consultancy_demo.png',
                'tab_order' => 5,
                'is_active' => true,
                'items' => [
                    ['title' => 'Set up the society and create mandatory 25+ file systems as per provisions of by-laws.', 'column' => 1, 'order' => 1],
                    ['title' => 'Service charges or day-to-day maintenance', 'column' => 1, 'order' => 2],
                    ['title' => 'Sinking fund', 'column' => 1, 'order' => 3],
                    ['title' => 'Repairs & maintenance fund', 'column' => 1, 'order' => 4],
                    ['title' => 'Major repair fund', 'column' => 1, 'order' => 5],
                    ['title' => 'Tenant related laws', 'column' => 2, 'order' => 1],
                    ['title' => 'Flat transfer cases', 'column' => 2, 'order' => 2],
                    ['title' => 'Recovery of outstanding dues', 'column' => 2, 'order' => 3],
                    ['title' => 'Parking issues', 'column' => 2, 'order' => 4],
                    ['title' => 'Day-to-Day correspondence matters', 'column' => 2, 'order' => 5],
                    ['title' => 'Regular co-operative updates', 'column' => 2, 'order' => 6],
                    ['title' => 'Dispute resolution envelope', 'column' => 2, 'order' => 7],
                ],
            ],
            [
                'title' => 'Statutory Registration',
                'slug' => 'statutory-registration',
                'icon' => 'fas fa-stamp',
                'short_description' => 'Complete statutory registration and documentation services for housing societies.',
                'tab_order' => 6,
                'is_active' => true,
                'items' => [
                    ['title' => 'Preparation and update of share certificates.', 'column' => 1, 'order' => 1],
                    ['title' => 'Preparation and update of I forms and J forms.', 'column' => 1, 'order' => 2],
                    ['title' => 'Nomination form activation.', 'column' => 1, 'order' => 3],
                    ['title' => 'Preparation and update of nomination register.', 'column' => 1, 'order' => 4],
                    ['title' => 'Preparation and update of share register and share ledger.', 'column' => 1, 'order' => 5],
                    ['title' => 'Preparation and update of investment register.', 'column' => 1, 'order' => 6],
                    ['title' => 'Preparation of Minutes of committee meeting.', 'column' => 1, 'order' => 7],
                    ['title' => 'Preparation of Minutes of general meeting.', 'column' => 1, 'order' => 8],
                    ['title' => 'Preparation of furniture and dead stock register.', 'column' => 1, 'order' => 9],
                    ['title' => 'Preparation and update of share transfer register.', 'column' => 1, 'order' => 10],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            $items = $serviceData['items'];
            unset($serviceData['items']);

            $service = \App\Models\Service::create($serviceData);

            foreach ($items as $item) {
                $service->items()->create([
                    'title' => $item['title'],
                    'column_number' => $item['column'],
                    'item_order' => $item['order'],
                ]);
            }
        }
    }
}
