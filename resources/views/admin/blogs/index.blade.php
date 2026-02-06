@extends('layouts.admin')
@section('title', 'Blogs')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manage Blogs</h1>
            <p class="text-slate-500 text-sm">Manage your blog posts and their content.</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="btn-premium">
            <i class="fas fa-plus"></i> Add New Blog
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Image</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Title</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Category</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($blogs as $blog)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            @if($blog->image)
                                <img src="{{ asset('assets/images/blogs/' . $blog->image) }}"
                                    class="w-12 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-700">{{ $blog->title }}</div>
                            <div class="text-xs text-slate-400 font-medium">{{ $blog->slug }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-violet-50 text-violet-600 rounded text-xs font-bold">
                                {{ $blog->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($blog->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">Active</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-bold">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.blogs.edit', $blog) }}"
                                    class="p-2 text-slate-400 hover:text-violet-600 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
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