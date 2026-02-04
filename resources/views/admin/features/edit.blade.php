@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Feature: {{ $feature->title }}</h1>
            <p class="text-slate-500 text-sm">Update the details for this feature.</p>
        </div>
        <a href="{{ route('admin.features.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-4xl">
        <form action="{{ route('admin.features.update', $feature) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="glass-card p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">FontAwesome Icon Class</label>
                        <input type="text" name="icon" value="{{ $feature->icon }}" placeholder="e.g., fas fa-rocket"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                        <p class="text-xs text-slate-400 mt-1">Example: <code
                                class="bg-slate-100 px-1 rounded">fas fa-columns</code></p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ $feature->title }}" placeholder="Feature Title"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Short Description</label>
                    <textarea name="short_description" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>{{ $feature->short_description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Long Description</label>
                    <textarea name="long_description" rows="5"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                        required>{{ $feature->long_description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ $feature->order }}"
                        class="w-32 bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                </div>
            </div>

            <div class="flex justify-end ps-6">
                <button type="submit"
                    class="bg-violet-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-violet-700 transition">
                    Update Feature
                </button>
            </div>
        </form>
    </div>
@endsection