@extends('layouts.frontend')

@section('content')
    <!-- App Promo Section -->
    <section id="app-promo" class="app-promo py-5 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center mb-5 mb-lg-0">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset(\App\Models\SiteContent::where('key', 'hero_image')->first()->content ?? 'assets/images/hero-3-img.png') }}"
                            alt="Mobile App" class="img-fluid hero-image-tilt">
                    </div>
                </div>
                <div class="col-lg-6 text-white promo-text-content">
                    <p class="fw-bold mb-4">
                        {!! \App\Models\SiteContent::where('key', 'hero_title')->first()->content ?? 'Be SMARTER, DELIGHT RESIDENTS...' !!}
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ \App\Models\SiteContent::where('key', 'hero_button_1_url')->first()->content ?? '#' }}"
                            class="btn btn-success hero-btn px-4 py-2 fw-bold">{{ \App\Models\SiteContent::where('key', 'hero_button_1_text')->first()->content ?? 'SIGNUP IT & TRY' }}</a>
                        <!-- <a href="{{ \App\Models\SiteContent::where('key', 'hero_button_2_url')->first()->content ?? '#' }}"
                                class="btn btn-success hero-btn px-4 py-2 fw-bold">{{ \App\Models\SiteContent::where('key', 'hero_button_2_text')->first()->content ?? 'START FREE' }}</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Bar -->
    <div class="download-bar text-center">
        <div class="container">
            <span class="text-white me-3 small d-none d-md-inline">Download our app:</span>
            <a href="{{ \App\Models\SiteContent::where('key', 'app_store_url')->first()->content ?? '#' }}"><img
                    src="{{ asset('assets/images/appstore.png') }}" alt="App Store"></a>
            <a href="{{ \App\Models\SiteContent::where('key', 'google_play_url')->first()->content ?? '#' }}"><img
                    src="{{ asset('assets/images/googleplay.png') }}" alt="Google Play"></a>
        </div>
    </div>

    <!-- Enterprise Dashboard Interface Section -->
    <section class="feature-row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'enterprise_image')->first()->content ?? 'assets/images/content-3-3-img.png') }}"
                        alt="Enterprise Dashboard Interface" class="img-fluid image-card-shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">
                        {!! \App\Models\SiteContent::where('key', 'enterprise_title')->first()->content ?? 'Enterprise Dashboard Interface' !!}
                    </h2>
                    <div class="lead mb-4">
                        {!! \App\Models\SiteContent::where('key', 'enterprise_description')->first()->content ?? 'Single Page View for Multi Sites, excellent control over operation & maintenance' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $enterprise_features = json_decode(\App\Models\SiteContent::where('key', 'enterprise_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach($enterprise_features as $feature)
                            <li><i class="fas fa-check-square"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Refer Section -->
    <section class="py-5 bg-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">Refer to earn Rewards</h2>
            <a href="#"><img src="{{ asset('assets/images/refer.png') }}" alt="Refer to earn Rewards" class="img-fluid"
                    style="max-height: 80px;"></a>
        </div>
    </section>

    <!-- Asset Management & PPM Section -->
    <section class="feature-row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">
                        {!! \App\Models\SiteContent::where('key', 'asset_title')->first()->content ?? 'Asset Management & PPM' !!}
                    </h2>
                    <div class="lead mb-4">
                        {!! \App\Models\SiteContent::where('key', 'asset_description')->first()->content ?? 'Manage Facility Assets & Operations' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $asset_features = json_decode(\App\Models\SiteContent::where('key', 'asset_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($asset_features as $feature)
                            <li><i class="fas fa-check-square"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'asset_image')->first()->content ?? 'assets/images/content-4-img.png') }}"
                        alt="Asset Management & PPM" class="img-fluid image-card-shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Helpdesk / Complaint Management Section -->
    <section class="feature-row bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">
                        {!! \App\Models\SiteContent::where('key', 'helpdesk_title')->first()->content ?? 'Helpdesk / Complaint Management (IVR)' !!}
                    </h2>
                    <div class="lead mb-4">
                        {!! \App\Models\SiteContent::where('key', 'helpdesk_description')->first()->content ?? 'Manage your complaints like never before! IVR enabled' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $helpdesk_features = json_decode(\App\Models\SiteContent::where('key', 'helpdesk_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($helpdesk_features as $feature)
                            <li><i class="fas fa-check-square"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'helpdesk_image')->first()->content ?? 'assets/images/content-3-1-img.png') }}"
                        alt="Helpdesk Management" class="img-fluid image-card-shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Billing & Payment Collection Section -->
    <section class="feature-row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0 text-center">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'billing_image')->first()->content ?? 'assets/images/content-3-2-img.png') }}"
                        alt="Billing & Payment" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">
                        {!! \App\Models\SiteContent::where('key', 'billing_title')->first()->content ?? 'Billing & Payment Collection' !!}
                    </h2>
                    <div class="lead mb-4">
                        {!! \App\Models\SiteContent::where('key', 'billing_description')->first()->content ?? '' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $billing_features = json_decode(\App\Models\SiteContent::where('key', 'billing_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($billing_features as $feature)
                            <li><i class="fas fa-check-square"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Accounting Management section -->
    <section class="dark-section py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'accounting_image')->first()->content ?? 'assets/images/content-4-img.png') }}"
                        alt="Accounting Management Tablet" class="img-fluid image-card-shadow">
                </div>
                <div class="col-lg-5 ps-lg-5 mt-5 mt-lg-0">
                    <div class="mb-4">
                        <i class="fas fa-fingerprint fa-3x text-white-50"></i>
                    </div>
                    <h2 class="fw-bold text-white mb-4">
                        {!! \App\Models\SiteContent::where('key', 'accounting_title')->first()->content ?? 'Accounting Management' !!}
                    </h2>
                    <div class="text-white-50 mb-4">
                        {!! \App\Models\SiteContent::where('key', 'accounting_description')->first()->content ?? '' !!}
                    </div>
                    <ul class="dark-feature-list">
                        @php
                            $accounting_features = json_decode(\App\Models\SiteContent::where('key', 'accounting_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($accounting_features as $feature)
                            <li><i class="fas fa-check-square"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Visitor Management Section -->
    <section class="feature-row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="{{ asset(\App\Models\SiteContent::where('key', 'visitor_image_1')->first()->content ?? 'assets/images/vms-1.png') }}"
                                alt="VMS 1" class="img-fluid image-card-shadow">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset(\App\Models\SiteContent::where('key', 'visitor_image_2')->first()->content ?? 'assets/images/vms-2.png') }}"
                                alt="VMS 2" class="img-fluid image-card-shadow">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5 mt-5 mt-lg-0">
                    <h2 class="fw-bold mb-4">
                        {!! \App\Models\SiteContent::where('key', 'visitor_title')->first()->content ?? 'Visitor Management' !!}
                    </h2>
                    <div class="text-muted mb-4">
                        {!! \App\Models\SiteContent::where('key', 'visitor_description')->first()->content ?? 'Track each visitor in the society, capture photograph and detail' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $visitor_features = json_decode(\App\Models\SiteContent::where('key', 'visitor_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($visitor_features as $feature)
                            <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Maid Management Section -->
    <section class="feature-row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="fw-bold mb-4">
                        {!! \App\Models\SiteContent::where('key', 'maid_title')->first()->content ?? 'Maid Management -<br>SMART Card Tracking' !!}
                    </h2>
                    <div class="text-muted mb-4">
                        {!! \App\Models\SiteContent::where('key', 'maid_description')->first()->content ?? 'Track Maid/Staff in the society, using Face Recognition ( AI) Smart Card (RFID) solution, Biometric & Face recognition' !!}
                    </div>
                    <ul class="feature-list-new">
                        @php
                            $maid_features = json_decode(\App\Models\SiteContent::where('key', 'maid_features')->first()->content ?? '[]', true);
                        @endphp
                        @foreach ($maid_features as $feature)
                            <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1 mt-5 mt-lg-0">
                    <img src="{{ asset(\App\Models\SiteContent::where('key', 'maid_image')->first()->content ?? 'assets/images/smart-card.jpg.jpeg') }}"
                        alt="Maid Management Smart Card" class="img-fluid image-card-shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- H2Hsafetech Features Grid -->
    <section class="py-5 dark-section">
        <div class="container py-lg-5">
            <div class="mb-5">
                <h2 class="fw-bold"><span class="text-white">Features</span> <span class="text-primary">H2Hsafetech
                        Features</span></h2>
            </div>
            <div class="row g-4">
                @foreach($features as $feature)
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-grid-item">
                            <div class="feature-grid-icon"><i class="{{ $feature->icon }}"></i></div>
                            <h5 class="fw-bold text-white">{{ $feature->title }}</h5>
                            <p class="small text-white-50">{{ $feature->short_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- App Screenshots Grid -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold mb-2">We care about the details</h2>
            <p class="lead text-muted mb-5">Better user experience, and lucid layouts.</p>
            <div class="app-grid mb-5">
                @foreach($screenshots as $screenshot)
                    <div class="app-grid-item">
                        <img src="{{ asset($screenshot->image_path) }}" alt="{{ $screenshot->alt_text }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection