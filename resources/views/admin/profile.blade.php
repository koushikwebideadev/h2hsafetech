@extends('layouts.admin')
@section('title', 'Profile')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Profile Settings</h1>
        <p class="text-slate-500 text-sm">Manage your account information and password.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto">
        <div class="glass-card overflow-hidden">
            <div class="bg-violet-600 px-6 py-4">
                <h3 class="text-white font-semibold flex items-center gap-2">
                    <i class="fas fa-user-edit"></i> Edit Admin Profile
                </h3>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST" class="p-6 space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div>
                    <h4 class="text-slate-800 font-semibold mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center text-xs">01</span>
                        Basic Information
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative">
                            <label for="name"
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1 px-1">Full
                                Name</label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-violet-500 transition-colors">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                                    required
                                    class="w-full pl-10 rounded-xl border-slate-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 text-sm py-2.5 transition-all">
                            </div>
                            @error('name')
                                <p class="mt-1 text-xs text-red-500 px-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative">
                            <label for="email"
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1 px-1">Email
                                Address</label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-violet-500 transition-colors">
                                    <i class="fas fa-envelope text-sm"></i>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                                    required
                                    class="w-full pl-10 rounded-xl border-slate-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 text-sm py-2.5 transition-all">
                            </div>
                            @error('email')
                                <p class="mt-1 text-xs text-red-500 px-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <!-- Security Section -->
                <div>
                    <h4 class="text-slate-800 font-semibold mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center text-xs">02</span>
                        Security Settings
                    </h4>

                    <div class="space-y-6">
                        <div class="relative max-w-md">
                            <label for="current_password"
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1 px-1">Current
                                Password</label>
                            <div class="relative group" x-data="{ show: false }">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-violet-500 transition-colors">
                                    <i class="fas fa-lock text-sm"></i>
                                </div>
                                <input :type="show ? 'text' : 'password'" name="current_password" id="current_password"
                                    class="w-full pl-10 pr-10 rounded-xl border-slate-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 text-sm py-2.5 transition-all"
                                    placeholder="Confirm existing password">
                                <button type="button" @click="show = !show"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-violet-500 transition-colors focus:outline-none">
                                    <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-xs text-red-500 px-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative">
                                <label for="new_password"
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1 px-1">New
                                    Password</label>
                                <div class="relative group" x-data="{ show: false }">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-violet-500 transition-colors">
                                        <i class="fas fa-key text-sm"></i>
                                    </div>
                                    <input :type="show ? 'text' : 'password'" name="new_password" id="new_password"
                                        class="w-full pl-10 pr-10 rounded-xl border-slate-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 text-sm py-2.5 transition-all"
                                        placeholder="Min. 8 characters">
                                    <button type="button" @click="show = !show"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-violet-500 transition-colors focus:outline-none">
                                        <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                    </button>
                                </div>
                                @error('new_password')
                                    <p class="mt-1 text-xs text-red-500 px-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="relative">
                                <label for="new_password_confirmation"
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1 px-1">Confirm
                                    New Password</label>
                                <div class="relative group" x-data="{ show: false }">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-violet-500 transition-colors">
                                        <i class="fas fa-shield-alt text-sm"></i>
                                    </div>
                                    <input :type="show ? 'text' : 'password'" name="new_password_confirmation"
                                        id="new_password_confirmation"
                                        class="w-full pl-10 pr-10 rounded-xl border-slate-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 text-sm py-2.5 transition-all">
                                    <button type="button" @click="show = !show"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-violet-500 transition-colors focus:outline-none">
                                        <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="btn-premium">
                        Save Account Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection