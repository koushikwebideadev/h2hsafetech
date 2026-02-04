@extends('layouts.admin')

@section('title', 'SEO Settings')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-slate-100">
            <div>
                <h1 class="text-xl font-bold text-slate-800">SEO Settings</h1>
                <p class="text-sm text-slate-500">Manage metatags and social sharing settings for your pages</p>
            </div>
            <!-- <a href="{{ route('admin.seo-settings.create') }}"
                class="bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                <i class="fas fa-plus"></i> Add New Page SEO
            </a> -->
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-800">Page SEO Configuration</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="seoTable">
                    <thead class="bg-slate-50">
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">
                                ID</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">
                                Page Name (Route)</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">
                                SEO Title</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">
                                SEO Image</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($seoSettings as $seo)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-slate-600">#{{ $seo->id }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                    <span
                                        class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs font-mono">{{ $seo->page_name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 max-w-xs truncate" title="{{ $seo->seo_title }}">
                                    {{ $seo->seo_title ?? 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    @if($seo->seo_image)
                                        <img src="{{ asset($seo->seo_image) }}" alt="SEO Image"
                                            class="h-10 w-10 object-cover rounded shadow-sm">
                                    @else
                                        <span class="text-xs text-slate-400 italic">No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.seo-settings.edit', $seo->id) }}"
                                            class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- <form action="{{ route('admin.seo-settings.destroy', $seo->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this configuration?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#seoTable').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: "Search pages...",
                }
            });
        });
    </script>
@endpush