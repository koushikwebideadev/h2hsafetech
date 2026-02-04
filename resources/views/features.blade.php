@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5">
        <div class="container py-lg-4 text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">H2Hsafetech <span class="fw-light">Features</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Features</li>
                </ol>
            </nav>
            <div class="wavy-line mx-auto"></div>
        </div>
    </section>

    <!-- Features Content -->
    <section class="py-5">
        <div class="container py-lg-4">
            <!-- Tabs Menu -->
            <ul class="nav nav-tabs feature-tabs mb-5 border-0 justify-content-center" id="featureTabs" role="tablist">
                @foreach($categories as $index => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="{{ $category->slug }}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{ $category->slug }}" type="button" role="tab">
                            {{ strtoupper($category->title) }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="featureTabsContent">
                @foreach($categories as $index => $category)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ $category->slug }}"
                        role="tabpanel">
                        <div class="row g-4">
                            @foreach($category->items as $item)
                                <div class="col-lg-3 col-md-6">
                                    <div class="feature-grid-card">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} mb-4" style="font-size: 3rem; color: var(--primary-color);"></i>
                                        @endif
                                        <h5>{{ $item->title }}</h5>
                                        @if($item->description)
                                            <p>{{ $item->description }}</p>
                                        @endif
                                        <a href="#" class="read-more-btn">READ MORE</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection