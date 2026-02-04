@extends('layouts.frontend')

@section('title', $blog->meta_title ?? $blog->title . ' - H2Hsafetech')

@push('css')
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit($blog->short_description, 160) }}">
    @if($blog->meta_image)
        <meta property="og:image" content="{{ asset('assets/images/blogs/' . $blog->meta_image) }}">
    @endif

    <style>
        .blog-content {
            line-height: 1.8;
            color: #444;
        }

        .blog-content h2,
        .blog-content h3,
        .blog-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #222;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content ul,
        .blog-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .blog-content blockquote {
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            background: #f8f9fa;
            font-style: italic;
            margin: 2rem 0;
        }
    </style>
@endpush

@section('content')
    <!-- Blog Post Header -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="mb-3">
                        <span class="badge bg-success px-3 py-2 rounded-pill small">
                            {{ $blog->category->name }}
                        </span>
                        <span class="text-muted small ms-3">
                            <i class="far fa-calendar-alt me-1"></i> {{ $blog->created_at->format('M d, Y') }}
                        </span>
                    </div>
                    <h1 class="display-4 fw-bold mb-4">{{ $blog->title }}</h1>
                    <p class="lead text-muted">{{ $blog->short_description }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if($blog->image)
                        <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="img-fluid rounded-4 shadow-sm mb-5 w-100">
                    @endif

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-content mb-5">
                                {!! $blog->long_description !!}
                            </div>

                            @if($blog->tags)
                                <div class="pt-4 border-top mt-5">
                                    <h6 class="fw-bold mb-3">Tags:</h6>
                                    @foreach(explode(',', $blog->tags) as $tag)
                                        <span class="badge bg-light text-muted border px-3 py-2 rounded-pill me-2 mb-2">
                                            #{{ trim($tag) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm p-4 sticky-top" style="top: 100px;">
                                <h5 class="fw-bold mb-4 border-bottom pb-2">Recent Posts</h5>
                                @foreach($recent_blogs as $recent)
                                    <div class="d-flex mb-4 gap-3">
                                        @if($recent->image)
                                            <img src="{{ asset('assets/images/blogs/' . $recent->image) }}" class="rounded"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="small fw-bold mb-1">
                                                <a href="{{ route('blogs.show', $recent->slug) }}"
                                                    class="text-dark text-decoration-none hover-success transition">
                                                    {{ Str::limit($recent->title, 40) }}
                                                </a>
                                            </h6>
                                            <span class="text-muted x-small"
                                                style="font-size: 0.75rem;">{{ $recent->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="mt-4 pt-4 border-top">
                                    <h5 class="fw-bold mb-3">Share this post</h5>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-outline-success btn-sm rounded-circle"
                                            style="width: 35px; height: 35px; padding: 0; line-height: 33px; text-align: center;">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info btn-sm rounded-circle"
                                            style="width: 35px; height: 35px; padding: 0; line-height: 33px; text-align: center;">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-dark btn-sm rounded-circle"
                                            style="width: 35px; height: 35px; padding: 0; line-height: 33px; text-align: center;">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection