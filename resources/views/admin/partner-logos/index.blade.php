@extends('layouts.admin')

@section('title', 'Partner Logos')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Partner Logos</h1>
            <p class="text-slate-500 text-sm">Manage rolling logo banner on the homepage.</p>
        </div>
        <a href="{{ route('admin.partner-logos.create') }}" class="btn-premium">
            <i class="fas fa-plus"></i> Add New Logo
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl flex items-center gap-3">
            <i class="fas fa-check-circle text-emerald-500"></i>
            {{ session('success') }}
        </div>
    @endif

    @if ($partnerLogos->isEmpty())
        <div class="glass-card px-6 py-12 text-center text-slate-500 italic">No partner logos found.</div>
    @else
        <div class="glass-card">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse datatable">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Logo</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Caption</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Link</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($partnerLogos as $logo)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <img src="{{ asset($logo->image) }}" alt="{{ $logo->title ?? 'Partner logo' }}"
                                    class="h-10 w-auto object-contain bg-slate-800 rounded p-1">
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $logo->title ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">
                                @if ($logo->link_type === 'external')
                                    <span class="inline-flex items-center gap-1 text-violet-600">
                                        <i class="fas fa-external-link-alt text-xs"></i> External
                                    </span>
                                @elseif ($logo->link_type === 'page')
                                    <span class="inline-flex items-center gap-1 text-blue-600">
                                        <i class="fas fa-file-alt text-xs"></i> {{ $logo->page?->title ?? 'Page' }}
                                    </span>
                                @else
                                    <span class="text-slate-400">No link</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($logo->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 border border-slate-200">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500 font-medium">{{ $logo->sort_order }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.partner-logos.edit', $logo) }}"
                                        class="p-2 text-slate-400 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.partner-logos.destroy', $logo) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this logo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
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
    </div>
    @endif
@endsection
