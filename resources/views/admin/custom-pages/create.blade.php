@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Add New Page</h1>
            <p class="text-slate-500 text-sm">Create a new standalone page for your website.</p>
        </div>
        <a href="{{ route('admin.custom-pages.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg text-sm font-medium">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-6xl">
        <form action="{{ route('admin.custom-pages.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">Page Content</h3>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Title</label>
                            <input type="text" name="title" placeholder="Page Title" value="{{ old('title') }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Slug (Optional - will be
                                auto-generated if empty)</label>
                            <input type="text" name="slug" placeholder="page-slug" value="{{ old('slug') }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Content</label>
                            <textarea name="content" rows="15"
                                class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Right Column: SEO -->
                <div class="space-y-6">
                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">SEO & Metadata</h3>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Meta Description</label>
                            <textarea name="meta_description" rows="5"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-violet-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-violet-700 transition shadow-lg shadow-violet-200 flex items-center justify-center gap-2">
                            <i class="fas fa-save"></i> Save Page
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach(el => {
            ClassicEditor
                .create(el, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <style>
        .ck-editor__editable {
            min-height: 400px;
            background-color: #f8fafc !important;
        }
    </style>
@endpush