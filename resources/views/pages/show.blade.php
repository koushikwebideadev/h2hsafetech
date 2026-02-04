@extends('layouts.frontend')

@section('title', ($page->meta_title ?: $page->title) . ' - H2Hsafetech')

@push('css')
    <meta name="description" content="{{ $page->meta_description }}">
    <style>
        .custom-page-content {
            line-height: 1.8;
            color: #444;
        }

        .custom-page-content h1,
        .custom-page-content h2,
        .custom-page-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #333;
        }

        .custom-page-content p {
            margin-bottom: 1.5rem;
        }

        .custom-page-content ul,
        .custom-page-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .custom-page-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            padding: 60px 0;
            margin-bottom: 40px;
        }
    </style>
@endpush

@section('content')
    <section class="custom-page-header text-white">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-0">{{ $page->title }}</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="custom-page-content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection