@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Testimonials</h1>
            <p class="text-slate-500 text-sm">Manage customer praise and feedback for the website.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-premium">
            <i class="fas fa-plus"></i> Add New Testimonial
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl flex items-center gap-3">
            <i class="fas fa-check-circle text-emerald-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse datatable">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Position</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Testimonial</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($testimonials as $testimonial)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $testimonial->id }}</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-700">{{ $testimonial->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $testimonial->position }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500">
                                <div class="max-w-xs truncate" title="{{ $testimonial->testimonial }}">
                                    "{{ Str::limit($testimonial->testimonial, 50) }}"
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($testimonial->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 border border-slate-200">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500 font-medium">{{ $testimonial->sort_order }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.testimonials.toggle-status', $testimonial) }}" 
                                        class="p-2 {{ $testimonial->is_active ? 'text-amber-500 hover:bg-amber-50' : 'text-emerald-500 hover:bg-emerald-50' }} rounded-lg transition"
                                        title="{{ $testimonial->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas {{ $testimonial->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                    </a>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                        class="p-2 text-slate-400 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500 italic">No testimonials found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
