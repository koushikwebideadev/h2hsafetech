@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Edit About Us Page</h1>
        <p class="text-slate-500 text-sm">Manage dynamic content for the About Us page.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.pages.about-us.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Main About Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-info-circle text-violet-500"></i> Main About Section
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Heading</label>
                        <input type="text" name="about_heading"
                            value="{{ \App\Models\SiteContent::where('key', 'about_heading')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Subheading</label>
                        <input type="text" name="about_subheading"
                            value="{{ \App\Models\SiteContent::where('key', 'about_subheading')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Lead Text</label>
                        <textarea name="about_lead_text" rows="3"
                            class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'about_lead_text')->first()->content ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Heading (e.g., "About TJSB
                            Bank")</label>
                        <input type="text" name="about_section_heading"
                            value="{{ \App\Models\SiteContent::where('key', 'about_section_heading')->first()->content ?? '' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Hero Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'about_image')->first()->content ?? '') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="about_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            <p class="text-xs text-slate-400 mt-2">Recommended: PNG or JPG image.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Badge Number</label>
                            <input type="text" name="about_badge_number"
                                value="{{ \App\Models\SiteContent::where('key', 'about_badge_number')->first()->content ?? '' }}"
                                placeholder="e.g., 52+"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Badge Text</label>
                            <input type="text" name="about_badge_text"
                                value="{{ \App\Models\SiteContent::where('key', 'about_badge_text')->first()->content ?? '' }}"
                                placeholder="e.g., Years of Excellence"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-bold text-slate-700 mb-1">About Content (Combined Paragraphs)</label>
                <textarea name="about_content" rows="8"
                    class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'about_content')->first()->content ?? '' }}</textarea>
                <p class="text-xs text-slate-400 mt-2">This will be displayed as the main content paragraphs about TJSB
                    Bank.</p>
            </div>
        </div>

        <!-- Milestones Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-trophy text-violet-500"></i> Milestones Section
            </h3>

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Milestone 1 -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-slate-700">Milestone 1</label>
                        <input type="text" name="milestone_1_icon"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_1_icon')->first()->content ?? 'fa-history' }}"
                            placeholder="Icon class (e.g., fa-history)"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_1_number"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_1_number')->first()->content ?? '52 Years' }}"
                            placeholder="Number/Title"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_1_text"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_1_text')->first()->content ?? 'Banking Excellence' }}"
                            placeholder="Description"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <!-- Milestone 2 -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-slate-700">Milestone 2</label>
                        <input type="text" name="milestone_2_icon"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_2_icon')->first()->content ?? 'fa-map-marker-alt' }}"
                            placeholder="Icon class"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_2_number"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_2_number')->first()->content ?? '163 Branches' }}"
                            placeholder="Number/Title"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_2_text"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_2_text')->first()->content ?? 'Across 5 States' }}"
                            placeholder="Description"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <!-- Milestone 3 -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-slate-700">Milestone 3</label>
                        <input type="text" name="milestone_3_icon"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_3_icon')->first()->content ?? 'fa-award' }}"
                            placeholder="Icon class"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_3_number"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_3_number')->first()->content ?? 'Award Winning' }}"
                            placeholder="Number/Title"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_3_text"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_3_text')->first()->content ?? 'Mobile Application' }}"
                            placeholder="Description"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <!-- Milestone 4 -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-slate-700">Milestone 4</label>
                        <input type="text" name="milestone_4_icon"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_4_icon')->first()->content ?? 'fa-rocket' }}"
                            placeholder="Icon class"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_4_number"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_4_number')->first()->content ?? 'Tech First' }}"
                            placeholder="Number/Title"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="milestone_4_text"
                            value="{{ \App\Models\SiteContent::where('key', 'milestone_4_text')->first()->content ?? 'Live with UPI & BBPS' }}"
                            placeholder="Description"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                </div>
            </div>
        </div>

        <!-- Digital Platform Section -->
        <div class="glass-card p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fas fa-mobile-alt text-violet-500"></i> Digital Platform Section
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Title</label>
                        <input type="text" name="digital_title"
                            value="{{ \App\Models\SiteContent::where('key', 'digital_title')->first()->content ?? 'Emerging & Inclusive' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Section Subtitle</label>
                        <input type="text" name="digital_subtitle"
                            value="{{ \App\Models\SiteContent::where('key', 'digital_subtitle')->first()->content ?? 'Digital Payments Platform' }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="digital_description" rows="3"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ \App\Models\SiteContent::where('key', 'digital_description')->first()->content ?? 'TJSB is fast marching towards being the financial destination that provides trusted and quality solutions through various digital channels:' }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Platform Image</label>
                    <div class="flex items-start gap-4">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'digital_image')->first()->content ?? 'assets/images/app-mockup.png') }}"
                            class="w-32 h-32 object-contain bg-slate-100 rounded-lg border border-slate-200">
                        <div class="flex-1">
                            <input type="file" name="digital_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            <p class="text-xs text-slate-400 mt-2">App mockup or platform image.</p>
                        </div>
                    </div>

                    <div class="space-y-2 mt-6 features-container">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Features List (Add More)</label>
                        @php
                            $features = json_decode(\App\Models\SiteContent::where('key', 'digital_features')->first()->content ?? '["Debit Cards & UPI", "RTGS, NEFT & IMPS", "Internet & Mobile Banking", "Bharat Bill Payment System (BBPS)"]', true);
                        @endphp
                        <div class="space-y-3 feature-inputs-wrapper">
                            @foreach($features as $feature)
                                <div class="flex gap-2 feature-row">
                                    <input type="text" name="digital_features[]" value="{{ $feature }}"
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
                            data-name="digital_features[]">
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