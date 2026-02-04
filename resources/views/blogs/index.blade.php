@extends('layouts.frontend')

@section('title', 'Company Blog - H2Hsafetech')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container text-center">
            <h1 class="fw-bold">Our Blog</h1>
            <p class="text-muted">Stay updated with the latest news and insights from H2Hsafetech.</p>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Blog List -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        @forelse($blogs as $blog)
                            <div class="col-md-6 installment">
                                <div class="card h-100 border-0 shadow-sm overflow-hidden blog-card">
                                    @if($blog->image)
                                        <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" class="card-img-top"
                                            alt="{{ $blog->title }}" style="height: 200px; object-cover: cover;">
                                    @else
                                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white"
                                            style="height: 200px;">
                                            <i class="fas fa-image fa-3x"></i>
                                        </div>
                                    @endif
                                    <div class="card-body p-4">
                                        <div class="mb-2">
                                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill small">
                                                {{ $blog->category->name }}
                                            </span>
                                            <span class="text-muted small ms-2">
                                                <i class="far fa-calendar-alt me-1"></i>
                                                {{ $blog->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                        <h5 class="card-title fw-bold mb-3">
                                            <a href="{{ route('blogs.show', $blog->slug) }}"
                                                class="text-decoration-none text-dark hover-primary transition">
                                                {{ $blog->title }}
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted small mb-4">
                                            {{ Str::limit($blog->short_description, 100) }}
                                        </p>
                                        <a href="{{ route('blogs.show', $blog->slug) }}"
                                            class="btn btn-outline-success btn-sm rounded-pill px-4">
                                            Read More <i class="fas fa-arrow-right ms-2 small"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="fas fa-newspaper fa-4x text-light mb-3"></i>
                                <h3 class="text-muted">No blog posts found.</h3>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5 blog-pagination">
                        {{ $blogs->links() }}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar sticky-top" style="top: 100px;">
                        <!-- Categories -->
                        <div class="card border-0 shadow-sm p-4 mb-4">
                            <h5 class="fw-bold mb-4 border-bottom pb-2">Categories</h5>
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                    <li class="mb-3">
                                        <a href="{{ route('blogs.index', ['category' => $category->slug]) }}"
                                            class="text-decoration-none d-flex justify-content-between align-items-center {{ request('category') == $category->slug ? 'text-primary fw-bold' : 'text-muted' }} hover-primary transition">
                                            <span>{{ $category->name }}</span>
                                            <span
                                                class="badge bg-light text-dark rounded-pill">{{ $category->blogs_count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Newsletter -->
                        <div class="card border-0 shadow-sm p-4 bg-primary text-white">
                            <h5 class="fw-bold mb-3">Subscribe</h5>
                            <p class="small mb-4 text-white-50">Get our latest insights directly in your inbox.</p>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Email Address">
                                </div>
                                <button type="submit" class="btn btn-light w-full fw-bold text-success">Subscribe
                                    Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .hover-primary:hover {
            color: var(--primary-color) !important;
        }

        .blog-card {
            transition: transform 0.3s ease, shadow 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
        }

        .page-header {
            background: linear-gradient(rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.9)), url('{{ asset('assets/images/pattern.png') }}');
        }

        /* Pagination Styling */
        .blog-pagination .pagination {
            justify-content: center;
            gap: 5px;
        }

        .blog-pagination .page-item .page-link {
            border: 1px solid #eef2f7;
            color: #475569;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .blog-pagination .page-item.active .page-link {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #fff !important;
            box-shadow: 0 4px 10px rgba(34, 197, 94, 0.2);
        }

        .blog-pagination .page-item .page-link:hover:not(.active) {
            background-color: #f8fafc;
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .blog-pagination .page-item:first-child .page-link,
        .blog-pagination .page-item:last-child .page-link {
            border-radius: 8px;
        }
    </style>
@endpush