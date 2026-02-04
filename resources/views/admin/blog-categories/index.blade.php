@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manage Blog Categories</h1>
            <p class="text-slate-500 text-sm">Manage the categories for your blog posts.</p>
        </div>
        <a href="{{ route('admin.blog-categories.create') }}"
            class="bg-violet-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-violet-700 transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Category
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card p-6 overflow-hidden">
        <table class="w-full text-left border-collapse datatable">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Slug</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Blogs Count</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($categories as $category)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-700">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $category->blogs_count }} blogs</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.blog-categories.edit', $category) }}"
                                    class="p-2 text-slate-400 hover:text-violet-600 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Are you sure? This will delete all blogs in this category.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection