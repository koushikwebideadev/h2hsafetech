@extends('layouts.frontend')

@section('title', 'Pricing - ' . ($settings['company_name'] ?? 'H2Hsafetech'))

@section('content')
    <!-- Hero Section -->
    <section class="pricing-hero">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">{!! $contents['pricing_hero']->firstWhere('key', 'title')?->content ?? 'Time is Money. Let us save you both.' !!}</h1>
            <h3 class="text-primary mb-4">{!! $contents['pricing_hero']->firstWhere('key', 'subtitle')?->content ?? 'Multiple plans that suits Apartment Complex of every size.' !!}</h3>
            <p class="text-muted mx-auto" style="max-width: 800px;">
                @php
                    $hero_desc = $contents['pricing_hero']->firstWhere('key', 'description')?->content ?? ($settings['company_name'] ?? 'H2Hsafetech') . ' is offered as an annual subscription with unit based Pricing. A Unit is a single flat / plot / villa / shop.';
                    $hero_desc = str_replace('{{ ($settings[\'company_name\'] ?? \'H2Hsafetech\') }}', $settings['company_name'] ?? 'H2Hsafetech', $hero_desc);
                @endphp
                {!! $hero_desc !!}
            </p>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($pricingPlans as $plan)
                <div class="col-lg">
                    <div class="pricing-card">
                        <div class="pricing-header {{ $plan->badge_color }}">{!! $plan->name !!}</div>
                        <div class="pricing-features">
                            <ul>
                                @foreach($plan->features as $feature)
                                <li>
                                    <i class="fas fa-{{ $feature->is_included ? 'check' : 'times' }}"></i> 
                                    {{ $feature->feature_name }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="{{ route('book-demo.index') }}" class="btn btn-pricing {{ $plan->button_color }}">
                                {{ $plan->button_text }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-5 small text-muted">
                <p>{!! $contents['pricing_notes']->firstWhere('key', 'title')?->content ?? 'Note:' !!}</p>
                <ul>
                    @php
                        $notes = json_decode($contents['pricing_notes']->firstWhere('key', 'content')?->content ?? '[]', true);
                    @endphp
                    @foreach($notes as $note)
                        <li>{!! str_replace('{{ ($settings[\'company_name\'] ?? \'H2Hsafetech\') }}', $settings['company_name'] ?? 'H2Hsafetech', $note) !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-pricing">
        <div class="container text-center">
            <h4 class="fw-bold mb-5">Praise from our Happy Customers</h4>
            <div class="row g-4">
                @forelse($testimonials as $testimonial)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="small text-muted mb-4">{!! str_replace('{{ ($settings[\'company_name\'] ?? \'H2Hsafetech\') }}', $settings['company_name'] ?? 'H2Hsafetech', $testimonial->testimonial) !!}</div>
                        <div class="mt-auto">
                            <h6 class="fw-bold mb-0">{{ $testimonial->name }}</h6>
                            <span class="small text-primary">{{ $testimonial->position }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted">No testimonials available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection