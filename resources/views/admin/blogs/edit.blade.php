@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Blog Post</h1>
            <p class="text-slate-500 text-sm">Update your blog post content and settings.</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-6xl">
        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">Blog Content</h3>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Title</label>
                            <input type="text" name="title" placeholder="Blog Title"
                                value="{{ old('title', $blog->title) }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Short Description</label>
                            <textarea name="short_description" rows="3"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('short_description', $blog->short_description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Long Description</label>
                            <textarea name="long_description" rows="10"
                                class="editor w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('long_description', $blog->long_description) }}</textarea>
                        </div>
                    </div>

                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">SEO & Metadata</h3>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Meta Title"
                                value="{{ old('meta_title', $blog->meta_title) }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Meta Description</label>
                            <textarea name="meta_description" rows="3"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Meta Image</label>
                            @if($blog->meta_image)
                                <div class="mb-2">
                                    <img src="{{ asset('assets/images/blogs/' . $blog->meta_image) }}"
                                        class="w-32 h-20 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" name="meta_image" accept="image/*"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>
                    </div>
                </div>

                <!-- Right Column: Settings -->
                <div class="space-y-6">
                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">Organization</h3>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Category</label>
                            <select name="blog_category_id" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Tags (Comma separated)</label>
                            <input type="text" name="tags" placeholder="e.g. Banking, Technology, Updates"
                                value="{{ old('tags', $blog->tags) }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        </div>

                        <div class="flex items-center gap-2 pt-2">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $blog->is_active) ? 'checked' : '' }} class="w-4 h-4 text-violet-600 rounded">
                            <label for="is_active" class="text-sm font-bold text-slate-700">Published</label>
                        </div>
                    </div>

                    <div class="glass-card p-6 space-y-4">
                        <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">Feature Image</h3>

                        <div>
                            @if($blog->image)
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/blogs/' . $blog->image) }}"
                                        class="w-full h-40 object-cover rounded-xl shadow-inner bg-slate-100">
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <p class="text-xs text-slate-400 mt-2 text-center">Recommended size: 1200x630px</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-violet-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-violet-700 transition shadow-lg shadow-violet-200 flex items-center justify-center gap-2">
                            <i class="fas fa-save"></i> Update Blog Post
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
            min-height: 300px;
            background-color: #f8fafc !important;
        }
    </style>
@endpush