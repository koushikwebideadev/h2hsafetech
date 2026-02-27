@extends('layouts.admin')
@section('title', 'Documents')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manage Documents</h1>
            <p class="text-slate-500 text-sm">Upload and manage documents for download.</p>
        </div>
        <a href="{{ route('admin.documents.create') }}" class="btn-premium">
            <i class="fas fa-plus"></i> Add New Document
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Source</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Date</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">File</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Created By</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Created At</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($documents as $doc)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-700">{{ $doc->title }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $doc->source ?? '—' }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $doc->date ? $doc->date->format('d M Y') : '—' }}</td>
                        <td class="px-6 py-4">
                            @if($doc->file)
                                <a href="{{ route('storage.serve', ['path' => 'documents/' . $doc->file]) }}" target="_blank" class="text-violet-600 hover:underline text-sm">
                                    <i class="fas fa-download mr-1"></i> Download
                                </a>
                            @else
                                <span class="text-slate-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $doc->creator->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-slate-500 text-sm">{{ $doc->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.documents.edit', $doc) }}"
                                    class="p-2 text-slate-400 hover:text-violet-600 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST"
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
