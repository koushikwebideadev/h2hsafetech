@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Contact Leads</h1>
            <p class="text-slate-500 text-sm">Manage inquiries and leads from the contact form.</p>
        </div>
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Email</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Subject</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Date</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($leads as $lead)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            @if($lead->status === 'new')
                                <span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase">New</span>
                            @elseif($lead->status === 'contacted')
                                <span
                                    class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold uppercase">Contacted</span>
                            @elseif($lead->status === 'resolved')
                                <span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase">Resolved</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-700">{{ $lead->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $lead->email }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $lead->subject ?: '-' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $lead->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.contact-leads.show', $lead) }}"
                                    class="p-2 text-slate-400 hover:text-blue-600 transition">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.contact-leads.destroy', $lead) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this lead?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                            No contact leads found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection