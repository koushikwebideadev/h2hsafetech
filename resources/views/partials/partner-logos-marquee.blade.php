@if(isset($partnerLogos) && $partnerLogos->isNotEmpty())
    <section class="partner-logos-bar" aria-label="Partner and award logos">
        <div class="partner-logos-marquee">
            <div class="partner-logos-track">
                @foreach ([1, 2] as $set)
                    @foreach ($partnerLogos as $logo)
                        @php $linkUrl = $logo->getLinkUrl(); @endphp
                        <div class="partner-logo-item">
                            @if ($linkUrl)
                                <a href="{{ $linkUrl }}"
                                    @if ($logo->link_type === 'external') target="_blank" rel="noopener noreferrer" @endif
                                    class="partner-logo-link">
                                    <img src="{{ asset($logo->image) }}" alt="{{ $logo->title ?? 'Partner logo' }}">
                                    @if ($logo->title)
                                        <span class="partner-logo-caption">{{ $logo->title }}</span>
                                    @endif
                                </a>
                            @else
                                <div class="partner-logo-link">
                                    <img src="{{ asset($logo->image) }}" alt="{{ $logo->title ?? 'Partner logo' }}">
                                    @if ($logo->title)
                                        <span class="partner-logo-caption">{{ $logo->title }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endif
