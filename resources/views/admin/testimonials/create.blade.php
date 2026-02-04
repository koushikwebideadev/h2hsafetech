@extends('layouts.admin')

@section('title', 'Create Testimonial')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Create Testimonial</h1>
            <p class="text-slate-500 text-sm">Add a new customer praise to the website.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn-premium btn-premium-sm btn-premium-outline">
            <i class="fas fa-arrow-left"></i> Back to list
        </a>
    </div>

    <div class="glass-card max-w-4xl">
        <div class="p-6 border-b border-slate-50">
            <h5 class="font-bold text-slate-800">Testimonial Details</h5>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" required
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-semibold text-slate-700 mb-2">Position <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="position" id="position" required
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('position') border-red-500 @enderror"
                            value="{{ old('position') }}">
                        @error('position')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="testimonial" class="block text-sm font-semibold text-slate-700 mb-2">Testimonial <span
                            class="text-red-500">*</span></label>
                    <textarea name="testimonial" id="testimonial" rows="4" required
                        class="editor w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('testimonial') border-red-500 @enderror">{{ old('testimonial') }}</textarea>
                    @error('testimonial')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">Image (Optional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 transition-all border border-slate-200 rounded-xl p-1">
                    @error('image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 pt-4 border-t border-slate-50">
                    <div class="flex items-center gap-2">
                        <div
                            class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                            <label for="is_active"
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <label for="is_active" class="text-sm font-semibold text-slate-700">Active Status</label>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-slate-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" min="0"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('sort_order', 0) }}">
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-50">
                    <button type="submit" class="btn-premium">
                        <i class="fas fa-save"></i> Save Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #7c3aed;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #7c3aed;
        }

        .toggle-checkbox {
            right: 1rem;
            transition: all 0.3s;
            border-color: #d1d5db;
        }
    </style>
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