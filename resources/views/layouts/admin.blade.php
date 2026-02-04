<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['company_name'] ?? 'Axelit Admin' }} - Admin</title>
    @php
        $favIcon = isset($settings['company_fav_icon']) ? json_decode($settings['company_fav_icon'], true) : null;
        $favIconPath = ($favIcon && isset($favIcon['image_name']))
            ? (($favIcon['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $favIcon['image_name']) : asset('storage/' . $favIcon['image_name']))
            : null;
    @endphp
    @if($favIconPath)
        <link rel="icon" type="image/x-icon" href="{{ $favIconPath }}">
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
        }

        .sidebar-active {
            background-color: #ede9fe;
            color: #7c3aed;
        }

        .glass-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .btn-premium {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #7c3aed;
            /* violet-600 */
            color: white;
            font-weight: 700;
            font-size: 0.875rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            /* rounded-xl */
            box-shadow: 0 10px 15px -3px rgba(124, 58, 237, 0.3);
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }

        .btn-premium:hover {
            background-color: #6d28d9;
            /* violet-700 */
            box-shadow: 0 20px 25px -5px rgba(124, 58, 237, 0.4);
            transform: translateY(-2px);
        }

        .btn-premium:active {
            transform: scale(0.95);
        }

        .btn-premium-sm {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            border-radius: 0.5rem;
        }

        .btn-premium-outline {
            background-color: transparent;
            color: #7c3aed;
            border: 2px solid #7c3aed;
            box-shadow: none;
        }

        .btn-premium-outline:hover {
            background-color: #f5f3ff;
            box-shadow: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem !important;
            border-radius: 0.5rem !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem !important;
            padding: 0.25rem 0.5rem !important;
            border: 1px solid #e2e8f0 !important;
        }

        table.dataTable thead th {
            border-bottom: 1px solid #e2e8f0 !important;
            background-color: #f8fafc !important;
            font-size: 0.75rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            font-weight: 700 !important;
            color: #64748b !important;
            padding: 1rem !important;
        }

        table.dataTable tbody td {
            padding: 1rem !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #ede9fe !important;
            border-color: #ddd6fe !important;
            color: #7c3aed !important;
            border-radius: 0.5rem !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f5f3ff !important;
            border-color: #ddd6fe !important;
            color: #7c3aed !important;
            border-radius: 0.5rem !important;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <div class="flex h-screen overflow-hidden"
        x-data="{ sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' }"
        x-init="$watch('sidebarCollapsed', val => localStorage.setItem('sidebarCollapsed', val))">
        <!-- Sidebar -->
        <aside :class="sidebarCollapsed ? 'w-20' : 'w-64'"
            class="bg-white border-r border-slate-100 flex-shrink-0 flex flex-col transition-all duration-300 overflow-hidden">
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-slate-50">
                <div class="flex items-center gap-2 font-bold text-2xl tracking-tight text-slate-800">
                    @php
                        $webLogo = isset($settings['company_web_logo']) ? json_decode($settings['company_web_logo'], true) : null;
                        $webLogoPath = ($webLogo && isset($webLogo['image_name']))
                            ? (($webLogo['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $webLogo['image_name']) : asset('storage/' . $webLogo['image_name']))
                            : null;
                    @endphp

                    @if($webLogoPath)
                        <img src="{{ $webLogoPath }}" alt="Logo" :class="sidebarCollapsed ? 'h-8 mx-auto' : 'h-8'">
                    @else
                        <span class="text-violet-600 text-3xl" :class="sidebarCollapsed ? 'mx-auto' : ''"><i
                                class="fas fa-cube"></i></span>
                        <span x-show="!sidebarCollapsed" x-transition>{{ $settings['company_name'] ?? 'Axelit' }}</span>
                    @endif
                </div>
            </div>

            <!-- Nav -->
            <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <p x-show="!sidebarCollapsed"
                    class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Dashboard</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm {{ Request::is('admin/dashboard') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} transition-colors"
                    :title="sidebarCollapsed ? 'Dashboard' : ''">
                    <i class="fas fa-home w-5 text-center"></i> <span x-show="!sidebarCollapsed">Dashboard</span>
                </a>

                <div class="pt-4">
                    <p x-show="!sidebarCollapsed"
                        class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Features</p>
                    <a href="{{ route('admin.features.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/features*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Manage Features' : ''">
                        <i class="fas fa-list w-5 text-center"></i> <span x-show="!sidebarCollapsed">Manage
                            Features</span>
                    </a>
                    <a href="{{ route('admin.screenshots.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/screenshots*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Manage Screenshots' : ''">
                        <i class="fas fa-mobile-screen w-5 text-center"></i> <span x-show="!sidebarCollapsed">Manage
                            Screenshots</span>
                    </a>
                    <a href="{{ route('admin.services.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/services*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Manage Services' : ''">
                        <i class="fas fa-concierge-bell w-5 text-center"></i> <span x-show="!sidebarCollapsed">Manage
                            Services</span>
                    </a>
                    <a href="{{ route('admin.feature-categories.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/feature-categories*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Feature Categories' : ''">
                        <i class="fas fa-layer-group w-5 text-center"></i> <span x-show="!sidebarCollapsed">Feature
                            Categories</span>
                    </a>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/testimonials*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Testimonials' : ''">
                        <i class="fas fa-quote-left w-5 text-center"></i> <span
                            x-show="!sidebarCollapsed">Testimonials</span>
                    </a>
                    <a href="{{ route('admin.contact-leads.index') }}"
                        class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/contact-leads*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Contact Leads' : ''">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope w-5 text-center"></i> <span x-show="!sidebarCollapsed">Contact
                                Leads</span>
                        </div>
                        @php $newLeads = \App\Models\ContactLead::where('status', 'new')->count(); @endphp
                        @if($newLeads > 0)
                            <span x-show="!sidebarCollapsed"
                                class="bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $newLeads }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.book-demo-leads.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/book-demo-leads*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Book Demo Leads' : ''">
                        <i class="fas fa-calendar-check w-5 text-center"></i> <span x-show="!sidebarCollapsed">Book Demo
                            Leads</span>
                    </a>

                    <p x-show="!sidebarCollapsed"
                        class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 pt-4">Blog</p>
                    <a href="{{ route('admin.blog-categories.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/blog-categories*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Blog Categories' : ''">
                        <i class="fas fa-tags w-5 text-center"></i> <span x-show="!sidebarCollapsed">Blog
                            Categories</span>
                    </a>
                    <a href="{{ route('admin.blogs.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/blogs*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Manage Blogs' : ''">
                        <i class="fas fa-blog w-5 text-center"></i> <span x-show="!sidebarCollapsed">Manage Blogs</span>
                    </a>
                </div>

                <div class="pt-4">
                    <p x-show="!sidebarCollapsed"
                        class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Pages</p>
                    <a href="{{ route('admin.pages.home.edit') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/pages/home') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Home page' : ''">
                        <i class="fas fa-shopping-bag w-5 text-center"></i> <span x-show="!sidebarCollapsed">Home
                            page</span>
                    </a>
                    <a href="{{ route('admin.pages.about-us.edit') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/pages/about-us') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'About Us Page' : ''">
                        <i class="fas fa-project-diagram w-5 text-center"></i> <span x-show="!sidebarCollapsed">About Us
                            Page</span>
                    </a>
                    <a href="{{ route('admin.site-contents.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/site-contents*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Pricing Page' : ''">
                        <i class="fas fa-file-invoice-dollar w-5 text-center"></i> <span
                            x-show="!sidebarCollapsed">Pricing Page</span>
                    </a>
                    <a href="{{ route('admin.custom-pages.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/custom-pages*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Custom Pages' : ''">
                        <i class="fas fa-file-alt w-5 text-center"></i> <span x-show="!sidebarCollapsed">Custom
                            Pages</span>
                    </a>
                    <a href="{{ route('admin.pricing-plans.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/pricing-plans*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Pricing Plans' : ''">
                        <i class="fas fa-tags w-5 text-center"></i> <span x-show="!sidebarCollapsed">Pricing
                            Plans</span>
                    </a>
                    <a href="{{ route('admin.business-settings.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/business-settings*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'Business Settings' : ''">
                        <i class="fas fa-cogs w-5 text-center"></i> <span x-show="!sidebarCollapsed">Business
                            Settings</span>
                    </a>
                    <a href="{{ route('admin.seo-settings.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('admin/seo-settings*') ? 'sidebar-active' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} font-medium text-sm transition-colors"
                        :title="sidebarCollapsed ? 'SEO Settings' : ''">
                        <i class="fas fa-search-plus w-5 text-center"></i> <span x-show="!sidebarCollapsed">SEO
                            Settings</span>
                    </a>

                </div>


            </div>

            <!-- User -->
            <div class="p-4 border-t border-slate-50">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-red-500 hover:bg-red-50 text-sm font-medium transition-colors"
                        :title="sidebarCollapsed ? 'Logout' : ''">
                        <i class="fas fa-sign-out-alt"></i> <span x-show="!sidebarCollapsed">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Topbar -->
            <header
                class="bg-white/80 backdrop-blur-md h-16 border-b border-slate-100 flex items-center justify-between px-6 z-10">
                <!-- Left: Search/Toggle -->
                <div class="flex items-center gap-4">
                    <button @click="sidebarCollapsed = !sidebarCollapsed"
                        class="text-slate-500 hover:text-slate-700 focus:outline-none">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                </div>

                <!-- Right: Actions -->
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" target="_blank"
                        class="hidden md:flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-violet-600 bg-violet-50 hover:bg-violet-100 rounded-lg transition-colors">
                        <i class="fas fa-external-link-alt"></i> Visit Website
                    </a>

                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.outside="open = false"
                            class="flex items-center gap-3 focus:outline-none">
                            <div class="hidden md:block text-right">
                                <p class="text-sm font-medium text-slate-700">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-400">Admin</p>
                            </div>
                            <div
                                class="h-10 w-10 rounded-full bg-violet-100 border-2 border-white overflow-hidden ring-2 ring-transparent hover:ring-violet-100 transition-all">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=7c3aed&color=fff"
                                    alt="User" class="h-full w-full object-cover">
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-slate-100 py-1 z-50"
                            style="display: none;">

                            <div class="px-4 py-3 border-b border-slate-50">
                                <p class="text-sm font-medium text-slate-800">Signed in as</p>
                                <p class="text-sm text-slate-500 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('admin.profile.edit') }}"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                                <i class="fas fa-user-circle w-5 text-slate-400"></i> Your Profile
                            </a>

                            <div class="border-t border-slate-50 my-1"></div>

                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-slate-50 transition-colors">
                                    <i class="fas fa-sign-out-alt w-5 text-red-400"></i> Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-6 scroll-smooth">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "responsive": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search records...",
                    "lengthMenu": "_MENU_ per page",
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>