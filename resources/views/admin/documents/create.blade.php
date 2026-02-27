@extends('layouts.admin')
@section('title', 'Add Document')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Add New Document</h1>
            <p class="text-slate-500 text-sm">Upload a document for visitors to download.</p>
        </div>
        <a href="{{ route('admin.documents.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="glass-card p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" placeholder="Document title" value="{{ old('title') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Source</label>
                    <input type="text" name="source" placeholder="e.g. BDA, HUD" value="{{ old('source') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    @error('source')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Date</label>
                    <input type="date" name="date" value="{{ old('date') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    @error('date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">File <span class="text-red-500">*</span></label>
                    <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.zip"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>
                    <p class="text-xs text-slate-400 mt-2">PDF, Word, Excel, TXT, ZIP. Max 10MB.</p>
                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-violet-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-violet-700 transition shadow-lg shadow-violet-200 flex items-center justify-center gap-2">
                        <i class="fas fa-upload"></i> Upload Document
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
