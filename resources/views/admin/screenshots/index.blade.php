@extends('layouts.admin')
@section('title', 'Screenshots')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manage Screenshots</h1>
            <p class="text-slate-500 text-sm">Manage the app screenshots displayed on the homepage.</p>
        </div>
        <a href="{{ route('admin.screenshots.create') }}"
            class="bg-violet-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-violet-700 transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Screenshot
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Screenshot</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Alt Text</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Order</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($screenshots as $screenshot)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <img src="{{ asset($screenshot->image_path) }}" alt="{{ $screenshot->alt_text }}"
                                class="h-20 w-auto rounded-lg shadow-sm">
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-700">{{ $screenshot->alt_text ?? 'No Alt Text' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $screenshot->order }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.screenshots.edit', $screenshot) }}"
                                    class="p-2 text-slate-400 hover:text-violet-600 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.screenshots.destroy', $screenshot) }}" method="POST"
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