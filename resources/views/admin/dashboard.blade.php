@extends('layouts.admin')

@section('content')
    <!-- Dashboard Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
            <p class="text-slate-500 text-sm">Welcome back, {{ Auth::user()->name }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Features -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Features</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $featuresCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-2xl">
                <i class="fas fa-list"></i>
            </div>
        </div>

        <!-- Services -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Services</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $servicesCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl">
                <i class="fas fa-concierge-bell"></i>
            </div>
        </div>

        <!-- Blogs -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Blogs</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $blogsCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-pink-50 text-pink-600 flex items-center justify-center text-2xl">
                <i class="fas fa-blog"></i>
            </div>
        </div>

        <!-- Custom Pages -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Custom Pages</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $pagesCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-2xl">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>

        <!-- Contact Leads -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Contact Leads</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $contactLeadsCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl">
                <i class="fas fa-envelope"></i>
            </div>
        </div>

        <!-- Book Demo Leads -->
        <div class="glass-card p-6 flex items-center justify-between">
            <div>
                <h3 class="text-slate-500 text-sm font-medium">Demo Leads</h3>
                <p class="text-3xl font-bold text-slate-800 mt-1">{{ $bookDemoLeadsCount }}</p>
            </div>
            <div class="h-14 w-14 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-2xl">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>


@endsection