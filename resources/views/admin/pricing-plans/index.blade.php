@extends('layouts.admin')

@section('title', 'Pricing Plans')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Pricing Plans</h1>
            <p class="text-slate-500 text-sm">Manage pricing plans and their features</p>
        </div>
        <a href="{{ route('admin.pricing-plans.create') }}" class="btn-premium btn-premium-sm">
            <i class="fas fa-plus"></i> Add New Plan
        </a>
    </div>

    @if(session('success'))
        <div class="glass-card p-4 mb-6 bg-green-50 border-green-200">
            <p class="text-green-800 text-sm">{{ session('success') }}</p>
        </div>
    @endif

    <div class="glass-card">
        <div class="p-6">
            <table class="datatable w-full">
                <thead>
                    <tr>
                        <th class="text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Plan Name</th>
                        <th class="text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Slug</th>
                        <th class="text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Features</th>
                        <th class="text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Sort Order</th>
                        <th class="text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plans as $plan)
                        <tr class="border-t border-slate-100">
                            <td class="py-4 text-sm font-medium text-slate-800">{!! $plan->name !!}</td>
                            <td class="py-4 text-sm text-slate-600">{{ $plan->slug }}</td>
                            <td class="py-4 text-sm text-slate-600">{{ $plan->features->count() }} features</td>
                            <td class="py-4 text-sm text-slate-600">{{ $plan->sort_order }}</td>
                            <td class="py-4">
                                <span
                                    class="px-2 py-1 text-xs rounded-full {{ $plan->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $plan->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pricing-plans.edit', $plan) }}"
                                        class="text-violet-600 hover:text-violet-800 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.pricing-plans.destroy', $plan) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this pricing plan?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500">
                                No pricing plans found. <a href="{{ route('admin.pricing-plans.create') }}"
                                    class="text-violet-600 hover:underline">Create one now</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection