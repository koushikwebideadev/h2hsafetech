@extends('layouts.admin')

@section('title', 'Edit ' . ucfirst(str_replace('_', ' ', str_replace('pricing_', '', $section))) . ' Section - Pricing Page')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit
                {{ ucfirst(str_replace('_', ' ', str_replace('pricing_', '', $section))) }}</h1>
            <p class="text-slate-500 text-sm">Update the content for the
                {{ str_replace('_', ' ', str_replace('pricing_', '', $section)) }} section of the pricing page.</p>
        </div>
        <a href="{{ route('admin.site-contents.index') }}" class="btn-premium btn-premium-sm btn-premium-outline">
            <i class="fas fa-arrow-left"></i> Back to list
        </a>
    </div>

    <div class="glass-card max-w-4xl">
        <div class="p-6 border-b border-slate-50">
            <h5 class="font-bold text-slate-800">Section Content</h5>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.site-contents.update', $section) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($section === 'pricing_hero')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="content_title" class="block text-sm font-semibold text-slate-700 mb-2">Hero
                                Title</label>
                            <textarea name="content[title]" id="content_title" rows="3"
                                class="editor w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm">{{ old('content.title', $contents->firstWhere('key', 'title')?->content) }}</textarea>
                            @error('content.title')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="content_subtitle" class="block text-sm font-semibold text-slate-700 mb-2">Hero
                                Subtitle</label>
                            <textarea name="content[subtitle]" id="content_subtitle" rows="3"
                                class="editor w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm">{{ old('content.subtitle', $contents->firstWhere('key', 'subtitle')?->content) }}</textarea>
                            @error('content.subtitle')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="content_description" class="block text-sm font-semibold text-slate-700 mb-2">Hero
                            Description</label>
                        <textarea name="content[description]" id="content_description" rows="4"
                            class="editor w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm">{{ old('content.description', $contents->firstWhere('key', 'description')?->content) }}</textarea>
                        <p class="mt-2 text-xs text-slate-400 italic">Tip: You can use your actual company name directly here.
                        </p>
                        @error('content.description')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @elseif($section === 'pricing_notes')
                    <div class="mb-6">
                        <label for="content_title" class="block text-sm font-semibold text-slate-700 mb-2">Notes Title</label>
                        <input type="text" name="content[title]" id="content_title"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('content.title', $contents->firstWhere('key', 'title')?->content) }}">
                        @error('content.title')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content_content" class="block text-sm font-semibold text-slate-700 mb-2">Notes Content (JSON
                            Array Format)</label>
                        <textarea name="content[content]" id="content_content" rows="8"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm font-mono">{{ old('content.content', $contents->firstWhere('key', 'content')?->content) }}</textarea>
                        <p class="mt-2 text-xs text-slate-400 italic">Enter as JSON array, e.g., ["Note 1", "Note 2", "Note 3"]
                        </p>
                        @error('content.content')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <div class="flex items-center gap-4 pt-4 border-t border-slate-50">
                    <button type="submit" class="btn-premium">
                        <i class="fas fa-save"></i> Update Content
                    </button>
                    <a href="{{ route('admin.site-contents.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
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