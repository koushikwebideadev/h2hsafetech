@extends('layouts.admin')

@section('title', 'Edit SEO Setting')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Edit SEO Setting</h1>
                <p class="text-slate-500 text-sm mt-1">Update configuration for <span
                        class="font-mono bg-violet-50 text-violet-600 px-1 rounded">{{ $seoSetting->page_name }}</span></p>
            </div>
            <a href="{{ route('admin.seo-settings.index') }}"
                class="text-slate-500 hover:text-slate-700 font-medium flex items-center gap-2 transition-colors">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <form action="{{ route('admin.seo-settings.update', $seoSetting->id) }}" method="POST"
                enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Page Name -->
                <div>
                    <label for="page_name" class="block text-sm font-semibold text-slate-700 mb-1">Page Name / Route Name
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="page_name" name="page_name"
                        value="{{ old('page_name', $seoSetting->page_name) }}" required
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors"
                        placeholder="e.g. home, about-us, services">
                    @error('page_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SEO Title -->
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-slate-700 mb-1">SEO Title</label>
                    <input type="text" id="seo_title" name="seo_title"
                        value="{{ old('seo_title', $seoSetting->seo_title) }}"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors">
                </div>

                <!-- SEO Description -->
                <div>
                    <label for="seo_description" class="block text-sm font-semibold text-slate-700 mb-1">SEO
                        Description</label>
                    <textarea id="seo_description" name="seo_description" rows="3"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors">{{ old('seo_description', $seoSetting->seo_description) }}</textarea>
                </div>

                <!-- SEO Keywords -->
                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-slate-700 mb-1">SEO Keywords</label>
                    <textarea id="seo_keywords" name="seo_keywords" rows="2"
                        class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-colors">{{ old('seo_keywords', $seoSetting->seo_keywords) }}</textarea>
                </div>

                <!-- SEO Image -->
                <div>
                    <label for="seo_image" class="block text-sm font-semibold text-slate-700 mb-1">SEO Image (OG
                        Image)</label>

                    @if($seoSetting->seo_image)
                        <div class="mb-3 p-2 bg-slate-50 border border-slate-200 rounded-lg inline-block">
                            <img src="{{ asset($seoSetting->seo_image) }}" alt="Current SEO Image"
                                class="h-32 w-auto object-cover rounded">
                            <p class="text-xs text-center text-slate-500 mt-1">Current Image</p>
                        </div>
                    @endif

                    <div class="mt-1 flex items-center justify-center w-full">
                        <label for="seo_image"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-400 mb-2"></i>
                                <p class="text-sm text-slate-500"><span class="font-semibold">Click to upload</span> to
                                    replace</p>
                                <p class="text-xs text-slate-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                            </div>
                            <input id="seo_image" name="seo_image" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex items-center gap-4 border-t border-slate-100">
                    <button type="submit" class="btn-premium">
                        Update SEO Settings
                    </button>
                    <a href="{{ route('admin.seo-settings.index') }}" class="btn-premium btn-premium-outline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection