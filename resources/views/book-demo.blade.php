@extends('layouts.frontend')

@section('title', 'Book a Demo - H2Hsafetech')

@section('content')
    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container py-lg-4 text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">Book <span class="fw-light">Demo</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Book Demo</li>
                </ol>
            </nav>
            <div class="wavy-line mx-auto"></div>
        </div>
    </section>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-5">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <h3 class="fw-bold mb-4 text-center">Request a Demonstration</h3>
                        <p class="text-muted text-center mb-5">Fill out the form below and our team will get in touch with
                            you to schedule a personalized demo.</p>

                        <form action="{{ route('book-demo.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-bold">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required
                                        placeholder="Your Full Name">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                        placeholder="your.email@example.com">
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile_no" class="form-label fw-bold">Mobile No. <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" required
                                        placeholder="Your Phone Number">
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-bold">Country <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" id="country" required
                                        placeholder="Your Country">
                                </div>

                                <div class="col-12">
                                    <label for="preferred_mode_of_call" class="form-label fw-bold">Preferred Mode of Call
                                        <span class="text-danger">*</span></label>
                                    <select name="preferred_mode_of_call" id="preferred_mode_of_call" required
                                        class="form-select">
                                        <option value="">Select Mode</option>
                                        <option value="Skype">Skype</option>
                                        <option value="Zoom">Zoom</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="Google Meet">Google Meet</option>
                                        <option value="MS Teams">MS Teams</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        Submit Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection