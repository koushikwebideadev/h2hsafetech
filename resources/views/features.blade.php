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
            @foreach($categories as $category)
                <div class="mb-5">
                    <h2 class="fw-bold text-dark mb-4 text-start text-uppercase fs-3 mb-4 border-bottom border-primary pb-2">{{ $category->title }}</h2>
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
                                    @if($item->long_description)
                                        <a href="#" class="read-more-btn" data-icon="{{ $item->icon }}"
                                            data-title="{{ $item->title }}" data-description="{{ e($item->long_description) }}"
                                            onclick="openFeatureModal(event, this)">READ MORE</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Modal Content Styling -->
    <style>
        #modalDescription h1,
        #modalDescription h2,
        #modalDescription h3,
        #modalDescription h4,
        #modalDescription h5,
        #modalDescription h6 {
            color: #1e293b;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        #modalDescription h1 {
            font-size: 1.8rem;
        }

        #modalDescription h2 {
            font-size: 1.5rem;
        }

        #modalDescription h3 {
            font-size: 1.3rem;
        }

        #modalDescription p {
            margin-bottom: 1rem;
            color: #64748b;
        }

        #modalDescription ul,
        #modalDescription ol {
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            color: #64748b;
        }

        #modalDescription li {
            margin-bottom: 0.5rem;
        }

        #modalDescription strong,
        #modalDescription b {
            color: #1e293b;
            font-weight: 600;
        }

        #modalDescription a {
            color: #10b981;
            text-decoration: underline;
        }

        #modalDescription a:hover {
            color: #059669;
        }

        #modalDescription blockquote {
            border-left: 4px solid #10b981;
            padding-left: 1rem;
            margin: 1rem 0;
            color: #475569;
            font-style: italic;
        }

        #modalDescription table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        #modalDescription table td,
        #modalDescription table th {
            border: 1px solid #e2e8f0;
            padding: 0.5rem;
        }

        #modalDescription table th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #1e293b;
        }

        #modalDescription em,
        #modalDescription i {
            font-style: italic;
        }

        #modalDescription u {
            text-decoration: underline;
        }
    </style>

    <!-- Feature Modal -->
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 1rem; overflow: hidden;">
                <div class="modal-header border-0 bg-light" style="padding: 2rem 2rem 1rem;">
                    <div class="d-flex align-items-center gap-3">
                        <div id="modalIcon" class="d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 1rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                            <i class="fas fa-home" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                        <h4 class="modal-title fw-bold mb-0" id="featureModalLabel" style="color: #1e293b;">Feature Title
                        </h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem; max-height: 60vh; overflow-y: auto;">
                    <div id="modalDescription" class="text-muted" style="font-size: 1rem; line-height: 1.8;">
                        <!-- Long description will be inserted here -->
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light" style="padding: 1rem 2rem 2rem;">
                    <button type="button" class="btn btn-secondary px-4 py-2" data-bs-dismiss="modal"
                        style="border-radius: 0.5rem; font-weight: 600;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openFeatureModal(event, element) {
            event.preventDefault();

            const icon = element.getAttribute('data-icon');
            const title = element.getAttribute('data-title');
            const description = element.getAttribute('data-description');

            // Update modal content
            const modalIcon = document.querySelector('#modalIcon i');
            if (icon) {
                modalIcon.className = icon;
            }

            document.getElementById('featureModalLabel').textContent = title;
            
            // Decode HTML entities and set as HTML
            const textarea = document.createElement('textarea');
            textarea.innerHTML = description;
            const decodedDescription = textarea.value;
            document.getElementById('modalDescription').innerHTML = decodedDescription;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('featureModal'));
            modal.show();
        }
    </script>
@endsection