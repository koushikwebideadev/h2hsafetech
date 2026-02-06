@extends('layouts.admin')
@section('title', 'Edit Screenshot')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Screenshot</h1>
            <p class="text-slate-500 text-sm">Update screenshot details.</p>
        </div>
        <a href="{{ route('admin.screenshots.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-xl">
        <form action="{{ route('admin.screenshots.update', $screenshot) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="glass-card p-6 space-y-4">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Current Screenshot</label>
                    <img src="{{ asset($screenshot->image_path) }}" alt="{{ $screenshot->alt_text }}"
                        class="h-40 w-auto rounded-lg shadow-sm border border-slate-200">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Replace Screenshot (Optional)</label>
                    <input type="file" name="image"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    <p class="text-xs text-slate-400 mt-1">Leave empty to keep the current image.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Alt Text</label>
                    <input type="text" name="alt_text" value="{{ $screenshot->alt_text }}" placeholder="e.g., App Dashboard"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ $screenshot->order }}"
                        class="w-32 bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>
            </div>

            <div class="flex justify-end ps-6">
                <button type="submit"
                    class="bg-violet-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-violet-700 transition">
                    Update Screenshot
                </button>
            </div>
        </form>
    </div>
@endsection