@extends('layouts.frontend')

@section('title', 'Documents - ' . ($settings['company_name'] ?? 'H2Hsafetech'))

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Documents</li>
                </ol>
            </nav>
            <h1 class="fw-bold mt-3">Documents</h1>
            <p class="text-muted">Browse and download documents.</p>
        </div>
    </section>

    <!-- Documents Section -->
    <section class="py-5">
        <div class="container">
            <div class="card border-0 shadow-sm bg-white overflow-hidden">
                <div class="card-body p-4 p-lg-5">
                    {{-- Search: top right --}}
                    <div class="d-flex justify-content-end mb-4">
                        <form action="{{ route('documents.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search"
                                class="form-control form-control-sm rounded-pill border border-secondary bg-white"
                                placeholder="Search by title..."
                                value="{{ request('search') }}"
                                style="width: 260px;">
                            @if(request('search'))
                                <a href="{{ route('documents.index') }}" class="btn btn-link btn-sm text-muted ms-2">Clear</a>
                            @endif
                        </form>
                    </div>

                    {{-- Table-style list: horizontal dividers only, no vertical/cell borders --}}
                    @forelse($documents as $index => $doc)
                        <div class="document-row d-flex flex-wrap align-items-center justify-content-between gap-2 py-3 {{ !$loop->first ? 'document-row-border' : '' }}">
                            <div class="flex-grow-1 pe-3" style="min-width: 0;">
                                <span class="text-dark">{{ $index + 1 }}.</span>
                                <span class="text-dark">{{ $doc->title }}</span>
                                @if($doc->date)
                                    <span class="document-date document-date-link">({{ $doc->date->format('d M Y') }})</span>
                                @endif
                            </div>
                            <div class="flex-shrink-0 text-end">
                                @if($doc->file)
                                    <a href="{{ route('storage.serve', ['path' => 'documents/' . $doc->file]) }}"
                                        class="btn btn-sm document-download-btn rounded"
                                        download>
                                        <i class="fas fa-download me-1"></i> Download
                                    </a>
                                @else
                                    <span class="text-muted small">No file</span>
                                @endif
                                @if($doc->source)
                                    <p class="text-muted small mb-0 mt-1">Source : {{ $doc->source }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <i class="fas fa-folder-open fa-4x text-light mb-3"></i>
                            <h5 class="text-muted">No documents found.</h5>
                            @if(request('search'))
                                <a href="{{ route('documents.index') }}" class="btn btn-outline-primary mt-2">Clear search</a>
                            @endif
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @push('css')
    <style>
        /* Row separator only: thin light-grey horizontal line, no vertical or cell borders */
        .document-row-border {
            border-top: 1px solid #e9ecef;
        }
        /* Date: blue hyperlink style */
        .document-date {
            color: #0d6efd;
        }
        .document-date-link:hover {
            text-decoration: underline;
        }
        /* Download: light blue background, white text and icon, rounded */
        .document-download-btn {
            background: #0ea5e9;
            border: none;
            color: #fff;
        }
        .document-download-btn:hover {
            background: #0284c7;
            color: #fff;
        }
    </style>
    @endpush
@endsection
