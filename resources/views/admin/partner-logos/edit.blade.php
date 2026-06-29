@extends('layouts.admin')

@section('title', 'Edit Partner Logo')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Partner Logo</h1>
            <p class="text-slate-500 text-sm">Update logo, caption, or link settings.</p>
        </div>
        <a href="{{ route('admin.partner-logos.index') }}" class="btn-premium btn-premium-sm btn-premium-outline">
            <i class="fas fa-arrow-left"></i> Back to list
        </a>
    </div>

    <div class="glass-card max-w-4xl">
        <div class="p-6 border-b border-slate-50">
            <h5 class="font-bold text-slate-800">Logo Details</h5>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.partner-logos.update', $partnerLogo) }}" method="POST" enctype="multipart/form-data"
                x-data="{ linkType: '{{ old('link_type', $partnerLogo->link_type) }}' }">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Current Logo</label>
                    <img src="{{ asset($partnerLogo->image) }}" alt="{{ $partnerLogo->title ?? 'Partner logo' }}"
                        class="h-16 w-auto object-contain bg-slate-800 rounded p-2 mb-3">
                    <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">Replace Logo (Optional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 transition-all border border-slate-200 rounded-xl p-1 @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Caption (Optional)</label>
                    <input type="text" name="title" id="title" placeholder="e.g., Best Property Tech Company"
                        class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('title') border-red-500 @enderror"
                        value="{{ old('title', $partnerLogo->title) }}">
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="link_type" class="block text-sm font-semibold text-slate-700 mb-2">Link Type <span class="text-red-500">*</span></label>
                    <select name="link_type" id="link_type" x-model="linkType" required
                        class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('link_type') border-red-500 @enderror">
                        <option value="none">No link</option>
                        <option value="external">External URL</option>
                        <option value="page">Custom Page</option>
                    </select>
                    @error('link_type')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6" x-show="linkType === 'external'" x-cloak>
                    <label for="external_url" class="block text-sm font-semibold text-slate-700 mb-2">External URL <span class="text-red-500">*</span></label>
                    <input type="url" name="external_url" id="external_url" placeholder="https://example.com"
                        class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('external_url') border-red-500 @enderror"
                        value="{{ old('external_url', $partnerLogo->external_url) }}">
                    @error('external_url')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6" x-show="linkType === 'page'" x-cloak>
                    <label for="page_id" class="block text-sm font-semibold text-slate-700 mb-2">Custom Page <span class="text-red-500">*</span></label>
                    <select name="page_id" id="page_id"
                        class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('page_id') border-red-500 @enderror">
                        <option value="">Select a page</option>
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}" {{ old('page_id', $partnerLogo->page_id) == $page->id ? 'selected' : '' }}>
                                {{ $page->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('page_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 pt-4 border-t border-slate-50">
                    <div class="flex items-center gap-2">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $partnerLogo->is_active) ? 'checked' : '' }}
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                            <label for="is_active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <label for="is_active" class="text-sm font-semibold text-slate-700">Active Status</label>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-slate-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" min="0"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('sort_order', $partnerLogo->sort_order) }}">
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-50">
                    <button type="submit" class="btn-premium">
                        <i class="fas fa-save"></i> Update Logo
                    </button>
                    <a href="{{ route('admin.partner-logos.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .toggle-checkbox:checked { right: 0; border-color: #7c3aed; }
        .toggle-checkbox:checked + .toggle-label { background-color: #7c3aed; }
        .toggle-checkbox { right: 1rem; transition: all 0.3s; border-color: #d1d5db; }
        [x-cloak] { display: none !important; }
    </style>
@endsection
