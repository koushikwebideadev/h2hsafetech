@extends('layouts.admin')
@section('title', 'Lead Details')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Lead Details</h1>
            <p class="text-slate-500 text-sm">View and manage contact inquiry from {{ $lead->name }}.</p>
        </div>
        <a href="{{ route('admin.contact-leads.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-card p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Inquiry Message</h3>
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 text-slate-700 whitespace-pre-wrap">
                    {{ $lead->message }}
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="glass-card p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Contact Info</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase">Name</p>
                            <p class="font-bold text-slate-700">{{ $lead->name }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase">Email</p>
                            <a href="mailto:{{ $lead->email }}"
                                class="font-bold text-blue-600 hover:underline">{{ $lead->email }}</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase">Phone</p>
                            <p class="font-bold text-slate-700">{{ $lead->phone ?: 'Not provided' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase">Date Received</p>
                            <p class="font-bold text-slate-700">{{ $lead->created_at->format('M d, Y (h:i A)') }}</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="glass-card p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Manage Status</h3>
                <form action="{{ route('admin.contact-leads.update-status', $lead) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Current Status</label>
                            <select name="status"
                                class="w-full bg-slate-50 border border-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted
                                </option>
                                <option value="resolved" {{ $lead->status === 'resolved' ? 'selected' : '' }}>Resolved
                                </option>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>

            <div class="glass-card p-6 border-red-50">
                <form action="{{ route('admin.contact-leads.destroy', $lead) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this lead?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full bg-red-50 text-red-600 py-2 rounded-lg text-sm font-bold hover:bg-red-100 transition">
                        Delete Lead
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection