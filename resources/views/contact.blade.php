@extends('layouts.frontend')

@section('title', 'Contact Us - H2Hsafetech')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5">
        <div class="container py-lg-4 text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">Contact <span class="fw-light">Us</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <div class="wavy-line mx-auto"></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container py-lg-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                        <h4 class="fw-bold text-primary mb-4">Contact Information</h4>
                        @if(isset($settings) && !empty($settings['company_address'] ?? null))
                        <div class="d-flex mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Corporate Office</h6>
                                <p class="text-muted small mb-0">{{ $settings['company_address'] }}</p>
                            </div>
                        </div>
                        @endif
                        @if(isset($settings) && !empty($settings['company_phone'] ?? null))
                        <div class="d-flex mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Phone Number</h6>
                                <p class="text-muted small mb-0">{{ $settings['company_phone'] }}</p>
                            </div>
                        </div>
                        @endif
                        @if(isset($settings) && !empty($settings['company_email'] ?? null))
                        <div class="d-flex mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email Address</h6>
                                <p class="text-muted small mb-0">{{ $settings['company_email'] }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                        <h2 class="fw-bold text-dark mb-4">Get in <span class="fw-light">Touch</span></h2>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter your name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Enter your phone number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Subject</label>
                                    <input type="text" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        placeholder="Enter subject" value="{{ old('subject') }}">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Your Message <span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                        rows="5" placeholder="Write your message here..."
                                        required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4 text-end">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 login-btn">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    @if(isset($settings) && !empty($settings['contact_map_embed_url'] ?? null))
    <section class="pb-5">
        <div class="container h-100">
            <div class="rounded-4 overflow-hidden shadow-sm" style="height: 400px;">
                <iframe
                    src="{{ $settings['contact_map_embed_url'] }}"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    @endif
@endsection