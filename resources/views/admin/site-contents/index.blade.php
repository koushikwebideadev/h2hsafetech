@extends('layouts.admin')

@section('title', 'Pricing Page Content Management')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Pricing Page Content Management</h1>
            <p class="text-slate-500 text-sm">Manage dynamic content for the pricing page hero and notes sections.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl flex items-center gap-3">
            <i class="fas fa-check-circle text-emerald-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Hero Section Card -->
        <div class="glass-card overflow-hidden">
            <div class="p-6 border-b border-slate-50 bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center">
                        <i class="fas fa-tv text-lg"></i>
                    </div>
                    <h5 class="text-lg font-bold text-slate-800">Pricing Hero Section</h5>
                </div>
            </div>
            <div class="p-6">
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Manage the heading, sub-heading, and introductory text displayed at the top of the pricing page.
                </p>
                <div class="flex justify-end">
                    <a href="{{ route('admin.site-contents.edit', 'pricing_hero') }}" class="btn-premium btn-premium-sm">
                        <i class="fas fa-edit"></i> Edit Content
                    </a>
                </div>
            </div>
        </div>

        <!-- Notes Section Card -->
        <div class="glass-card overflow-hidden">
            <div class="p-6 border-b border-slate-50 bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-sticky-note text-lg"></i>
                    </div>
                    <h5 class="text-lg font-bold text-slate-800">Pricing Notes Section</h5>
                </div>
            </div>
            <div class="p-6">
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Manage the technical and legal notes shown below the pricing cards (JSON format).
                </p>
                <div class="flex justify-end">
                    <a href="{{ route('admin.site-contents.edit', 'pricing_notes') }}" class="btn-premium btn-premium-sm">
                        <i class="fas fa-edit"></i> Edit Content
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection