@extends('layouts.admin')
@section('title', 'Edit Document')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Document</h1>
            <p class="text-slate-500 text-sm">Update document details and file.</p>
        </div>
        <a href="{{ route('admin.documents.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="glass-card p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" placeholder="Document title" value="{{ old('title', $document->title) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Source</label>
                    <input type="text" name="source" placeholder="e.g. BDA, HUD" value="{{ old('source', $document->source) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    @error('source')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Date</label>
                    <input type="date" name="date" value="{{ old('date', $document->date?->format('Y-m-d')) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    @error('date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">File</label>
                    @if($document->file)
                        <div class="mb-2 flex items-center gap-2">
                            <a href="{{ route('storage.serve', ['path' => 'documents/' . $document->file]) }}" target="_blank"
                                class="text-violet-600 hover:underline text-sm">
                                <i class="fas fa-download"></i> Current file
                            </a>
                        </div>
                    @endif
                    <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.zip"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    <p class="text-xs text-slate-400 mt-2">Leave empty to keep current file. Max 10MB.</p>
                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-violet-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-violet-700 transition shadow-lg shadow-violet-200 flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i> Update Document
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
