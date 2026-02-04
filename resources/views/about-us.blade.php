@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container py-lg-4 text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">About <span class="fw-light">Us</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">About Us</li>
                </ol>
            </nav>
            <div class="wavy-line mx-auto"></div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-img-box position-relative">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'about_image')->first()->content ?? 'assets/images/hero-bg.png') }}" 
                            alt="About H2Hsafetech"
                            class="img-fluid rounded-4 shadow-lg">
                        <div class="experience-badge bg-primary text-white p-4 rounded-4 shadow-lg animate-pulse">
                            <h2 class="fw-bold mb-0">{{ \App\Models\SiteContent::where('key', 'about_badge_number')->first()->content ?? '52+' }}</h2>
                            <p class="mb-0 small">{{ \App\Models\SiteContent::where('key', 'about_badge_text')->first()->content ?? 'Years of Excellence' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="display-6 fw-bold text-dark mb-4">
                        {{ \App\Models\SiteContent::where('key', 'about_heading')->first()->content ?? 'H2Hsafetech: Housing & Commercial' }} 
                        <span class="fw-light">{{ \App\Models\SiteContent::where('key', 'about_subheading')->first()->content ?? 'Management Simplified' }}</span>
                    </h2>
                    <p class="lead text-muted mb-4">
                        {!! \App\Models\SiteContent::where('key', 'about_lead_text')->first()->content ?? 'H2Hsafetech is a housing & commercial society management & accounting app introduced by TJSB Sahakari Bank Ltd (TJSB).' !!}
                    </p>

                    <h4 class="fw-bold text-primary mb-3">
                        {{ \App\Models\SiteContent::where('key', 'about_section_heading')->first()->content ?? 'About TJSB Bank' }}
                    </h4>
                    <div class="mb-5 text-secondary">
                        {!! \App\Models\SiteContent::where('key', 'about_content')->first()->content ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Milestones Section -->
    <section class="py-5 bg-light">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-dark">Milestones <span class="fw-light">Achieved</span></h2>
                <div class="wavy-line mx-auto"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="milestone-card p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                        <div class="milestone-icon text-primary mb-3">
                            <i class="fas {{ \App\Models\SiteContent::where('key', 'milestone_1_icon')->first()->content ?? 'fa-history' }} fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">{{ \App\Models\SiteContent::where('key', 'milestone_1_number')->first()->content ?? '52 Years' }}</h5>
                        <p class="small text-muted mb-0">{{ \App\Models\SiteContent::where('key', 'milestone_1_text')->first()->content ?? 'Banking Excellence' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="milestone-card p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                        <div class="milestone-icon text-primary mb-3">
                            <i class="fas {{ \App\Models\SiteContent::where('key', 'milestone_2_icon')->first()->content ?? 'fa-map-marker-alt' }} fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">{{ \App\Models\SiteContent::where('key', 'milestone_2_number')->first()->content ?? '163 Branches' }}</h5>
                        <p class="small text-muted mb-0">{{ \App\Models\SiteContent::where('key', 'milestone_2_text')->first()->content ?? 'Across 5 States' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="milestone-card p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                        <div class="milestone-icon text-primary mb-3">
                            <i class="fas {{ \App\Models\SiteContent::where('key', 'milestone_3_icon')->first()->content ?? 'fa-award' }} fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">{{ \App\Models\SiteContent::where('key', 'milestone_3_number')->first()->content ?? 'Award Winning' }}</h5>
                        <p class="small text-muted mb-0">{{ \App\Models\SiteContent::where('key', 'milestone_3_text')->first()->content ?? 'Mobile Application' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="milestone-card p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                        <div class="milestone-icon text-primary mb-3">
                            <i class="fas {{ \App\Models\SiteContent::where('key', 'milestone_4_icon')->first()->content ?? 'fa-rocket' }} fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">{{ \App\Models\SiteContent::where('key', 'milestone_4_number')->first()->content ?? 'Tech First' }}</h5>
                        <p class="small text-muted mb-0">{{ \App\Models\SiteContent::where('key', 'milestone_4_text')->first()->content ?? 'Live with UPI & BBPS' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Digital Platform Section -->
    <section class="py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'digital_image')->first()->content ?? 'assets/images/app-mockup.png') }}" 
                        alt="Digital Banking" class="img-fluid rounded-4">
                </div>
                <div class="col-lg-6 pe-lg-5 order-lg-1">
                    <h2 class="display-6 fw-bold text-dark mb-4">
                        {{ \App\Models\SiteContent::where('key', 'digital_title')->first()->content ?? 'Emerging & Inclusive' }} 
                        <span class="fw-light">{{ \App\Models\SiteContent::where('key', 'digital_subtitle')->first()->content ?? 'Digital Payments Platform' }}</span>
                    </h2>
                    <p class="mb-4">{{ \App\Models\SiteContent::where('key', 'digital_description')->first()->content ?? 'TJSB is fast marching towards being the financial destination that provides trusted and quality solutions through various digital channels:' }}</p>
                    <ul class="digital-list list-unstyled mb-5">
                        @php
                            $digitalFeatures = json_decode(\App\Models\SiteContent::where('key', 'digital_features')->first()->content ?? '["Debit Cards & UPI", "RTGS, NEFT & IMPS", "Internet & Mobile Banking", "Bharat Bill Payment System (BBPS)"]', true);
                        @endphp
                        @foreach($digitalFeatures as $feature)
                            <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="btn btn-primary btn-lg px-5">Learn More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
