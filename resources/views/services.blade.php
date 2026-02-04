@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5">
        <div class="container py-lg-4 text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">H2Hsafetech <span class="fw-light">Services</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Services</li>
                </ol>
            </nav>
            <div class="wavy-line mx-auto"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container py-lg-4">
            <!-- Tabs Menu -->
            <ul class="nav nav-tabs feature-tabs mb-5 border-0 justify-content-center" id="serviceTabs" role="tablist">
                @foreach($services as $index => $service)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="{{ $service->slug }}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{ $service->slug }}" type="button" role="tab">
                            {{ strtoupper($service->title) }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="serviceTabsContent">
                @foreach($services as $index => $service)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ $service->slug }}"
                        role="tabpanel">
                        <div class="service-tab-content">
                            <div class="service-card-title">
                                <div class="service-header-icon bg-primary">
                                    <i class="{{ $service->icon }}"></i>
                                </div>
                                <h4 class="fw-bold m-0 text-primary">{{ $service->title }}</h4>
                            </div>

                            @if($service->short_description)
                                <p class="text-muted mb-4">{{ $service->short_description }}</p>
                            @endif

                            @if($service->long_description)
                                <p class="text-muted mb-4 small">{{ $service->long_description }}</p>
                            @endif

                            <div class="row align-items-center">
                                @php
                                    $itemsByColumn = $service->items->groupBy('column_number');
                                    $hasImage = $service->image && file_exists(public_path('assets/images/' . $service->image));
                                    $columnClass = $hasImage ? 'col-md-4' : 'col-md-6';
                                @endphp

                                @foreach([1, 2, 3] as $columnNumber)
                                    @if($itemsByColumn->has($columnNumber) && $itemsByColumn[$columnNumber]->isNotEmpty())
                                        <div class="{{ $columnClass }}">
                                            <ul class="service-tab-list">
                                                @foreach($itemsByColumn[$columnNumber] as $item)
                                                    <li>{{ $item->title }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach

                                @if($hasImage)
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/images/' . $service->image) }}" alt="{{ $service->title }} Demo"
                                            class="service-demo-img">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection