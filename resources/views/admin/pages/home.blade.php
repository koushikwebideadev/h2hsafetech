@extends('layouts.admin')
@section('title', 'Edit Homepage')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Edit Homepage</h1>
        <p class="text-slate-500 text-sm">Manage dynamic content for the main landing page.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.pages.home.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Hero Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-rocket text-violet-500"></i> Hero Section
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Hero Title (Rich Text Editor)</label>
                        <textarea name="hero_title" rows="4"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'hero_title')->first()->content ?? '' }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Button 1 Text</label>
                            <input type="text" name="hero_button_1_text"
                                value="{{ \App\Models\SiteContent::where('key', 'hero_button_1_text')->first()->content ?? '' }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Button 1 URL</label>
                            <input type="text" name="hero_button_1_url"
                                value="{{ \App\Models\SiteContent::where('key', 'hero_button_1_url')->first()->content ?? '' }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Button 2 Text</label>
                            <input type="text" name="hero_button_2_text"
                                value="{{ \App\Models\SiteContent::where('key', 'hero_button_2_text')->first()->content ?? '' }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Button 2 URL</label>
                            <input type="text" name="hero_button_2_url"
                                value="{{ \App\Models\SiteContent::where('key', 'hero_button_2_url')->first()->content ?? '' }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Hero Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'hero_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="hero_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            <p class="text-xs text-slate-400 mt-2">Recommended: PNG with transparent background.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Download Bar Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-download text-violet-500"></i> Download App Links
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">App Store URL</label>
                    <input type="text" name="app_store_url" 
                        value="{{ \App\Models\SiteContent::where('key', 'app_store_url')->first()->content ?? '#' }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Google Play URL</label>
                    <input type="text" name="google_play_url" 
                        value="{{ \App\Models\SiteContent::where('key', 'google_play_url')->first()->content ?? '#' }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>
            </div>
        </div>

        <!-- Enterprise Dashboard Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-desktop text-violet-500"></i> Enterprise Dashboard
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="enterprise_title"
                            value="{{ \App\Models\SiteContent::where('key', 'enterprise_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="enterprise_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'enterprise_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'enterprise_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="enterprise_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'enterprise_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="enterprise_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="enterprise_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Asset Management & PPM Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-boxes text-violet-500"></i> Asset Management & PPM
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="asset_title"
                            value="{{ \App\Models\SiteContent::where('key', 'asset_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="asset_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'asset_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'asset_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="asset_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'asset_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="asset_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="asset_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Helpdesk / Complaint Management Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-headset text-violet-500"></i> Helpdesk / Complaint Management
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="helpdesk_title"
                            value="{{ \App\Models\SiteContent::where('key', 'helpdesk_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="helpdesk_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'helpdesk_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'helpdesk_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="helpdesk_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'helpdesk_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="helpdesk_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="helpdesk_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing & Payment Collection Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-file-invoice-dollar text-violet-500"></i> Billing & Payment Collection
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="billing_title"
                            value="{{ \App\Models\SiteContent::where('key', 'billing_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="billing_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'billing_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'billing_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="billing_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'billing_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="billing_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="billing_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accounting Management Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-calculator text-violet-500"></i> Accounting Management
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="accounting_title"
                            value="{{ \App\Models\SiteContent::where('key', 'accounting_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="accounting_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'accounting_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'accounting_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="accounting_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'accounting_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="accounting_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="accounting_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visitor Management Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-id-card text-violet-500"></i> Visitor Management
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="visitor_title"
                            value="{{ \App\Models\SiteContent::where('key', 'visitor_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="visitor_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'visitor_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Images (Two required)</label>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <img src="{{ asset(\App\Models\SiteContent::where('key', 'visitor_image_1')->first()->content ?? '') }}"
                                class="w-full h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                            <input type="file" name="visitor_image_1"
                                class="block w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                        <div class="space-y-2">
                            <img src="{{ asset(\App\Models\SiteContent::where('key', 'visitor_image_2')->first()->content ?? '') }}"
                                class="w-full h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                            <input type="file" name="visitor_image_2"
                                class="block w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'visitor_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="visitor_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="visitor_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maid Management Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-user-shield text-violet-500"></i> Maid Management
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="maid_title"
                            value="{{ \App\Models\SiteContent::where('key', 'maid_title')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="maid_description" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'maid_description')->first()->content ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Section Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'maid_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="maid_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'maid_features')->first()->content ?? '[]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="maid_features[]" value="{{ $feature }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                    <button type="button"
                                        class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-feature mt-2 flex items-center gap-2 text-violet-600 text-sm font-bold hover:text-violet-700 transition"
                            data-name="maid_features[]">
                            <i class="fas fa-plus-circle"></i> Add New Feature
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="px-8 py-3 bg-violet-600 text-white rounded-lg font-bold hover:bg-violet-700 shadow-lg shadow-violet-200 transition">
                Save Changes
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach(el => {
            ClassicEditor
                .create(el, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                        'undo', 'redo'
                    ]
                })
                .catch(error => {
                    console.error(error);
                });
        });

        // Dynamic Features Logic
        document.querySelectorAll('.add-feature').forEach(button => {
            button.addEventListener('click', (e) => {
                const container = e.target.closest('.features-container').querySelector('.feature-inputs-wrapper');
                const name = e.target.closest('.add-feature').dataset.name;
                const row = document.createElement('div');
                row.className = 'flex gap-2 feature-row';
                row.innerHTML = `
                            <input type="text" name="${name}" value=""
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <button type="button" class="remove-feature bg-red-50 text-red-500 p-3 rounded-lg hover:bg-red-100 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        `;
                container.appendChild(row);
            });
        });

        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-feature')) {
                e.target.closest('.feature-row').remove();
            }
        });
    </script>
    <style>
        .ck-editor__editable {
            min-height: 150px;
            background-color: #f8fafc !important;
        }

        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: #e2e8f0 !important;
        }
    </style>
@endpush