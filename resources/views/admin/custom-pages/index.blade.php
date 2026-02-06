@extends('layouts.admin')
@section('title', 'Custom Pages')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manage Custom Pages</h1>
            <p class="text-slate-500 text-sm">Create and manage standalone pages for your website.</p>
        </div>
        <a href="{{ route('admin.custom-pages.create') }}" class="btn-premium">
            <i class="fas fa-plus"></i> Add New Page
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Title</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Slug</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Meta Title</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($pages as $page)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-700">{{ $page->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-slate-500 font-medium">/{{ $page->slug }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-slate-500 truncate max-w-xs">{{ $page->meta_title ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('pages.show', $page->slug) }}" target="_blank"
                                    class="p-2 text-slate-400 hover:text-blue-600 transition" title="View Page">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.custom-pages.edit', $page) }}"
                                    class="p-2 text-slate-400 hover:text-violet-600 transition" title="Edit Page">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.custom-pages.destroy', $page) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this page?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition"
                                        title="Delete Page">
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