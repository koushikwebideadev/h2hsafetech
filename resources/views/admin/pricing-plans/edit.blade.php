@extends('layouts.admin')

@section('title', 'Edit Pricing Plan')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Pricing Plan</h1>
            <p class="text-slate-500 text-sm">Update pricing plan details and features</p>
        </div>
        <a href="{{ route('admin.pricing-plans.index') }}" class="btn-premium btn-premium-sm btn-premium-outline">
            <i class="fas fa-arrow-left"></i> Back to list
        </a>
    </div>

    <div class="glass-card max-w-5xl">
        <div class="p-6 border-b border-slate-50">
            <h5 class="font-bold text-slate-800">Plan Details</h5>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.pricing-plans.update', $pricingPlan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Plan Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" required
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('name') border-red-500 @enderror"
                            value="{{ old('name', $pricingPlan->name) }}"
                            placeholder="e.g., FREE or STANDARD<br>SECURITY">
                        <p class="mt-1 text-xs text-slate-400">You can use &lt;br&gt; for line breaks</p>
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-semibold text-slate-700 mb-2">Slug <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" id="slug" required
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm @error('slug') border-red-500 @enderror"
                            value="{{ old('slug', $pricingPlan->slug) }}"
                            placeholder="e.g., free, standard-security">
                        @error('slug')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="badge_color" class="block text-sm font-semibold text-slate-700 mb-2">Badge Color Class</label>
                        <input type="text" name="badge_color" id="badge_color"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('badge_color', $pricingPlan->badge_color) }}"
                            placeholder="e.g., bg-free, bg-security">
                        <p class="mt-1 text-xs text-slate-400">CSS class for the plan header background</p>
                    </div>

                    <div>
                        <label for="button_color" class="block text-sm font-semibold text-slate-700 mb-2">Button Color Class</label>
                        <input type="text" name="button_color" id="button_color"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('button_color', $pricingPlan->button_color) }}"
                            placeholder="e.g., btn-success bg-free border-0">
                        <p class="mt-1 text-xs text-slate-400">CSS classes for the button styling</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="button_text" class="block text-sm font-semibold text-slate-700 mb-2">Button Text <span class="text-red-500">*</span></label>
                        <input type="text" name="button_text" id="button_text" required
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('button_text', $pricingPlan->button_text) }}"
                            placeholder="e.g., Get Started Now">
                        @error('button_text')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-slate-700 mb-2">Sort Order <span class="text-red-500">*</span></label>
                        <input type="number" name="sort_order" id="sort_order" required min="0"
                            class="w-full rounded-xl border-slate-200 focus:border-violet-500 focus:ring-violet-500 transition-all text-sm"
                            value="{{ old('sort_order', $pricingPlan->sort_order) }}">
                        @error('sort_order')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6 pt-4 border-t border-slate-50">
                    <div class="flex items-center gap-2">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $pricingPlan->is_active) ? 'checked' : '' }}
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                            <label for="is_active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <label for="is_active" class="text-sm font-semibold text-slate-700">Active Status</label>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="mb-6 pt-4 border-t border-slate-50">
                    <div class="flex items-center justify-between mb-4">
                        <h6 class="font-bold text-slate-800">Plan Features</h6>
                        <button type="button" onclick="addFeature()" class="btn-premium-sm">
                            <i class="fas fa-plus"></i> Add Feature
                        </button>
                    </div>

                    <div id="features-container" class="space-y-3">
                        @foreach($pricingPlan->features as $index => $feature)
                        <div class="feature-row grid grid-cols-12 gap-3 items-center p-3 bg-slate-50 rounded-lg">
                            <div class="col-span-6">
                                <input type="text" name="features[{{ $index }}][feature_name]" 
                                    class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 text-sm"
                                    value="{{ $feature->feature_name }}" placeholder="Feature name" required>
                            </div>
                            <div class="col-span-2">
                                <input type="number" name="features[{{ $index }}][sort_order]" 
                                    class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 text-sm"
                                    value="{{ $feature->sort_order }}" placeholder="Order" required>
                            </div>
                            <div class="col-span-3 flex items-center gap-2">
                                <input type="checkbox" name="features[{{ $index }}][is_included]" value="1" 
                                    {{ $feature->is_included ? 'checked' : '' }}
                                    class="rounded border-slate-300 text-violet-600 focus:ring-violet-500">
                                <label class="text-sm text-slate-700">Included</label>
                            </div>
                            <div class="col-span-1 text-right">
                                <button type="button" onclick="removeFeature(this)" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-50">
                    <button type="submit" class="btn-premium">
                        <i class="fas fa-save"></i> Update Plan
                    </button>
                    <a href="{{ route('admin.pricing-plans.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #7c3aed;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #7c3aed;
        }
        .toggle-checkbox {
            right: 1rem;
            transition: all 0.3s;
            border-color: #d1d5db;
        }
    </style>
@endsection

@push('scripts')
<script>
let featureIndex = {{ $pricingPlan->features->count() }};

function addFeature() {
    const container = document.getElementById('features-container');
    const newRow = `
        <div class="feature-row grid grid-cols-12 gap-3 items-center p-3 bg-slate-50 rounded-lg">
            <div class="col-span-6">
                <input type="text" name="features[${featureIndex}][feature_name]" 
                    class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 text-sm"
                    placeholder="Feature name" required>
            </div>
            <div class="col-span-2">
                <input type="number" name="features[${featureIndex}][sort_order]" 
                    class="w-full rounded-lg border-slate-200 focus:border-violet-500 focus:ring-violet-500 text-sm"
                    value="${featureIndex + 1}" placeholder="Order" required>
            </div>
            <div class="col-span-3 flex items-center gap-2">
                <input type="checkbox" name="features[${featureIndex}][is_included]" value="1" checked
                    class="rounded border-slate-300 text-violet-600 focus:ring-violet-500">
                <label class="text-sm text-slate-700">Included</label>
            </div>
            <div class="col-span-1 text-right">
                <button type="button" onclick="removeFeature(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newRow);
    featureIndex++;
}

function removeFeature(button) {
    button.closest('.feature-row').remove();
}
</script>
@endpush
