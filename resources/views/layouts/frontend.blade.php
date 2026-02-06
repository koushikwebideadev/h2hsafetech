<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO Logic --}}
    @php
        $currentRoute = Route::currentRouteName();
        // Fallback or specific logic if route name is null (e.g., home page might differ)
        $seoSetting = \App\Models\SeoSetting::where('page_name', $currentRoute)->orWhere('page_name', request()->path())->first();

        $metaTitle = $seoSetting ? ($seoSetting->seo_title ?? ($settings['company_name'] ?? 'H2Hsafetech')) : ($settings['company_name'] ?? 'H2Hsafetech');
        $metaDesc = $seoSetting ? ($seoSetting->seo_description ?? ($settings['footer_description'] ?? 'H2Hsafetech - Hassle-Free Society Management')) : ($settings['footer_description'] ?? 'H2Hsafetech - Hassle-Free Society Management');
        $metaKeywords = $seoSetting ? ($seoSetting->seo_keywords ?? 'society management, housing society, banking') : 'society management, housing society, banking';
        $metaImage = $seoSetting && $seoSetting->seo_image ? asset($seoSetting->seo_image) : asset('assets/images/logo.png');
    @endphp

    <title>@yield('title', $metaTitle)</title>
    <meta name="description" content="@yield('meta_description', $metaDesc)">
    <meta name="keywords" content="@yield('meta_keywords', $metaKeywords)">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', $metaTitle)">
    <meta property="og:description" content="@yield('meta_description', $metaDesc)">
    <meta property="og:image" content="@yield('meta_image', $metaImage)">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', $metaTitle)">
    <meta property="twitter:description" content="@yield('meta_description', $metaDesc)">
    <meta property="twitter:image" content="@yield('meta_image', $metaImage)">

    <!-- Favicon -->
    @php
        $favIcon = isset($settings['company_fav_icon']) ? json_decode($settings['company_fav_icon'], true) : null;
        $favIconPath = ($favIcon && isset($favIcon['image_name']))
            ? (($favIcon['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $favIcon['image_name']) : asset('storage/' . $favIcon['image_name']))
            : asset('assets/images/favicon.ico');
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ $favIconPath }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('css')
</head>

<body>

    <!-- Top Bar -->
    <div class="top-bar py-2 d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <a href="mailto:{{ $settings['company_email'] ?? 'response@tjsb.co.in' }}"><i
                        class="fas fa-envelope me-2"></i>{{ $settings['company_email'] ?? 'response@tjsb.co.in' }}</a>
            </div>
            @php
                $socials = isset($settings['social_links']) ? json_decode($settings['social_links'], true) : [];
            @endphp
            <div class="social-links">
                @if(isset($socials['facebook'])) <a href="{{ $socials['facebook'] }}"><i
                class="fab fa-facebook-f"></i></a> @endif
                @if(isset($socials['twitter'])) <a href="{{ $socials['twitter'] }}"><i class="fab fa-twitter"></i></a>
                @endif
                @if(isset($socials['linkedin'])) <a href="{{ $socials['linkedin'] }}"><i
                class="fab fa-linkedin-in"></i></a> @endif
                @if(isset($socials['instagram'])) <a href="{{ $socials['instagram'] }}"><i
                class="fab fa-instagram"></i></a> @endif
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                @php
                    $webLogo = isset($settings['company_web_logo']) ? json_decode($settings['company_web_logo'], true) : null;
                    $webLogoPath = ($webLogo && isset($webLogo['image_name']))
                        ? (($webLogo['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $webLogo['image_name']) : asset('storage/' . $webLogo['image_name']))
                        : asset('assets/images/logo.png');
                @endphp
                <img src="{{ $webLogoPath }}" alt="{{ $settings['company_name'] ?? 'H2Hsafetech' }} Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ Route::is('home') ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('about-us') ? 'active' : '' }}"
                            href="{{ route('about-us') }}">About us</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('features') ? 'active' : '' }}"
                            href="{{ route('features') }}">Features</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('pricing') ? 'active' : '' }}"
                            href="{{ route('pricing') }}">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('services') ? 'active' : '' }}"
                            href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('blogs.index') ? 'active' : '' }}"
                            href="{{ route('blogs.index') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('book-demo.index') ? 'active' : '' }}"
                            href="{{ route('book-demo.index') }}">Book a Demo</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact</a></li>
                    <!-- <li class="nav-item ms-lg-3"><a class="btn btn-primary login-btn px-4"
                            href="{{ route('admin.login') }}">Login</a></li> -->
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    @php
                        $footerLogo = isset($settings['company_footer_logo']) ? json_decode($settings['company_footer_logo'], true) : null;
                        $webLogo = isset($settings['company_web_logo']) ? json_decode($settings['company_web_logo'], true) : null;

                        $logoImage = null;
                        $logoStorage = 'public'; // default

                        if ($footerLogo && isset($footerLogo['image_name'])) {
                            $logoImage = $footerLogo['image_name'];
                            $logoStorage = $footerLogo['storage'] ?? 'public';
                        } elseif ($webLogo && isset($webLogo['image_name'])) {
                            $logoImage = $webLogo['image_name'];
                            $logoStorage = $webLogo['storage'] ?? 'public';
                        }

                        if ($logoImage) {
                            if ($logoStorage == 'assets/images') {
                                $logoPath = asset('assets/images/' . $logoImage);
                            } else {
                                $logoPath = asset('storage/' . $logoImage);
                            }
                        } else {
                            $logoPath = asset('assets/images/logo.png');
                        }
                    @endphp
                    <img src="{{ $logoPath }}" alt="Logo" height="60" class="mb-4">
                    <p class="text-muted pe-lg-4">
                        {{ $settings['footer_description'] ?? 'H2Hsafetech provides comprehensive solutions for housing society management, combining technology with banking expertise.' }}
                    </p>
                    <div class="footer-social mt-4">
                        @if(isset($socials['facebook'])) <a href="{{ $socials['facebook'] }}" class="me-3"><i
                        class="fab fa-facebook-f"></i></a> @endif
                        @if(isset($socials['twitter'])) <a href="{{ $socials['twitter'] }}" class="me-3"><i
                        class="fab fa-twitter"></i></a> @endif
                        @if(isset($socials['linkedin'])) <a href="{{ $socials['linkedin'] }}" class="me-3"><i
                        class="fab fa-linkedin-in"></i></a> @endif
                        @if(isset($socials['instagram'])) <a href="{{ $socials['instagram'] }}"><i
                        class="fab fa-instagram"></i></a> @endif
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5 class="fw-bold mb-4">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        @php
                            $quickLinks = isset($settings['quick_links']) ? json_decode($settings['quick_links'], true) : [];
                        @endphp
                        @if(count($quickLinks) > 0)
                            @foreach($quickLinks as $link)
                                <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                            @endforeach
                        @else
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('features') }}">Features</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-4">Our Features</h5>
                    <ul class="list-unstyled footer-links">
                        @php
                            $footerFeaturesSettings = isset($settings['footer_features']) ? json_decode($settings['footer_features'], true) : [];
                            $footerFeaturesDb = \App\Models\Feature::take(5)->get();
                        @endphp

                        {{-- Prioritize settings if available --}}
                        @if(count($footerFeaturesSettings) > 0)
                            @foreach($footerFeaturesSettings as $link)
                                <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                            @endforeach
                        @elseif($footerFeaturesDb->count() > 0)
                            @foreach($footerFeaturesDb as $feature)
                                <li><a href="#">{{ $feature->title }}</a></li>
                            @endforeach
                        @else
                            <li><a href="#">Society Share</a></li>
                            <li><a href="#">Data Management</a></li>
                            <li><a href="#">Accounting</a></li>
                            <li><a href="#">Email/SMS Alerts</a></li>
                            <li><a href="#">Payment Gateway</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-4">Contact Us</h5>
                    <ul class="list-unstyled footer-contact">
                        <li><i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            {{ $settings['company_address'] ?? 'Thane, Maharashtra, India' }}</li>
                        <li><i class="fas fa-envelope me-2 text-primary"></i> {{ $settings['company_email'] ??
                            'response@tjsb.co.in' }}</li>
                        <li><i class="fas fa-phone-alt me-2 text-primary"></i>
                            {{ $settings['company_phone'] ?? '1800 223 466' }}</li>
                    </ul>
                </div>
            </div>
            <hr class="my-5 opacity-10">
            <div class="text-center">
                <p class="text-muted mb-0 small">&copy; {{ date('Y') }}
                    {{ $settings['company_name'] ?? 'H2Hsafetech' }}.
                    {{ $settings['company_copyright_text'] ?? 'All Rights Reserved. Powered by TJSB Bank.' }}
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')
</body>

</html>