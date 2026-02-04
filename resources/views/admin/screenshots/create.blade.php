@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Add New Screenshot</h1>
            <p class="text-slate-500 text-sm">Upload a new app screenshot.</p>
        </div>
        <a href="{{ route('admin.screenshots.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-xl">
        <form action="{{ route('admin.screenshots.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="glass-card p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Upload Screenshot</label>
                    <input type="file" name="image"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>
                    <p class="text-xs text-slate-400 mt-1">Recommended size: Portrait (e.g., 300x600 px)</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Alt Text</label>
                    <input type="text" name="alt_text" placeholder="e.g., App Dashboard"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="0"
                        class="w-32 bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>
            </div>

            <div class="flex justify-end ps-6">
                <button type="submit"
                    class="bg-violet-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-violet-700 transition">
                    Upload Screenshot
                </button>
            </div>
        </form>
    </div>
@endsection