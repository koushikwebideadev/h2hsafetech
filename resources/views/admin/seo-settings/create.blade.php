@extends('layouts.admin')

@section('title', 'Add SEO Setting')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Add SEO Setting</h1>
                <p class="text-slate-500 text-sm mt-1">Configure search engine visibility for a specific page.</p>
            </div>
            <a href="{{ route('admin.seo-settings.index') }}"
                class="text-slate-500 hover:text-slate-700 font-medium flex items-center gap-2 transition-colors">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <form action="{{ route('admin.seo-settings.store') }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-6">
                @csrf

                <!-- Page Name -->
                <div>
                    <label for="page_name" class="block text-sm font-semibold text-slate-700 mb-1">Page Name / Route Name
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="page_name" name="page_name" value="{{ old('page_name') }}" required
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors"
                        placeholder="e.g. home, about-us, services">
                    <p class="text-xs text-slate-400 mt-1">
                        Enter the Route Name defined in Laravel (e.g., 'home') or the exact URL path.
                    </p>
                    @error('page_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SEO Title -->
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-slate-700 mb-1">SEO Title</label>
                    <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title') }}"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors"
                        placeholder="Page Title displayed in search results">
                </div>

                <!-- SEO Description -->
                <div>
                    <label for="seo_description" class="block text-sm font-semibold text-slate-700 mb-1">SEO
                        Description</label>
                    <textarea id="seo_description" name="seo_description" rows="3"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors"
                        placeholder="Brief description of the page content...">{{ old('seo_description') }}</textarea>
                    <p class="text-xs text-slate-400 mt-1">Recommended length: 150-160 characters.</p>
                </div>

                <!-- SEO Keywords -->
                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-slate-700 mb-1">SEO Keywords</label>
                    <textarea id="seo_keywords" name="seo_keywords" rows="2"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors"
                        placeholder="Comma separated keywords (e.g. society, housing, management)">{{ old('seo_keywords') }}</textarea>
                </div>

                <!-- SEO Image -->
                <div>
                    <label for="seo_image" class="block text-sm font-semibold text-slate-700 mb-1">SEO Image (OG
                        Image)</label>
                    <div class="mt-1 flex items-center justify-center w-full">
                        <label for="seo_image"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-400 mb-2"></i>
                                <p class="text-sm text-slate-500"><span class="font-semibold">Click to upload</span> or drag
                                    and drop</p>
                                <p class="text-xs text-slate-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                            </div>
                            <input id="seo_image" name="seo_image" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex items-center gap-4 border-t border-slate-100">
                    <button type="submit"
                        class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-2.5 rounded-lg font-medium transition-colors shadow-sm shadow-violet-200">
                        Save SEO Settings
                    </button>
                    <a href="{{ route('admin.seo-settings.index') }}"
                        class="text-slate-600 hover:text-slate-900 font-medium px-4 py-2.5 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection