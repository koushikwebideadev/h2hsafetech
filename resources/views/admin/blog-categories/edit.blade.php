@extends('layouts.admin')
@section('title', 'Edit Blog Category')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Category</h1>
            <p class="text-slate-500 text-sm">Update your blog category details.</p>
        </div>
        <a href="{{ route('admin.blog-categories.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to Categories
        </a>
    </div>

    <div class="max-w-2xl">
        <div class="glass-card p-8">
            <form action="{{ route('admin.blog-categories.update', $blogCategory) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Category Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $blogCategory->name) }}" required
                            class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-violet-100 focus:border-violet-400 transition"
                            placeholder="e.g. Technology">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-violet-600 text-white px-8 py-2.5 rounded-lg text-sm font-bold hover:bg-violet-700 transition shadow-lg shadow-violet-200">
                            Update Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection