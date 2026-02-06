@extends('layouts.admin')
@section('title', 'Edit Service')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Service</h1>
            <p class="text-slate-500 text-sm">Update service information and items.</p>
        </div>
        <a href="{{ route('admin.services.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-6xl">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="glass-card p-6 space-y-4">
                <h3 class="font-bold text-slate-700 mb-4">Basic Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Title</label>
                        <input type="text" name="title" placeholder="Service Title"
                            value="{{ old('title', $service->title) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">FontAwesome Icon Class</label>
                        <input type="text" name="icon" placeholder="e.g., fas fa-gears"
                            value="{{ old('icon', $service->icon) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <p class="text-xs text-slate-400 mt-1">Example: <code
                                class="bg-slate-100 px-1 rounded">fas fa-calculator</code></p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Short Description</label>
                    <textarea name="short_description" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('short_description', $service->short_description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Long Description (Optional)</label>
                    <textarea name="long_description" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">{{ old('long_description', $service->long_description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Tab Order</label>
                        <input type="number" name="tab_order" value="{{ old('tab_order', $service->tab_order) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Demo Image</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        @if($service->image)
                            <p class="text-xs text-slate-400 mt-1">Current: {{ $service->image }}</p>
                        @endif
                    </div>
                    <div class="flex items-end">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="w-4 h-4 text-violet-600 rounded">
                            <span class="text-sm font-bold text-slate-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="glass-card p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-700">Service Items</h3>
                    <button type="button" onclick="addServiceItem()"
                        class="bg-violet-100 text-violet-600 px-3 py-1 rounded text-sm font-bold hover:bg-violet-200 transition">
                        <i class="fas fa-plus"></i> Add Item
                    </button>
                </div>

                <div id="service-items-container" class="space-y-3">
                    @foreach($service->items as $index => $item)
                        <div class="flex gap-3 items-start bg-slate-50 p-3 rounded-lg service-item">
                            <input type="text" name="items[{{ $index }}][title]" placeholder="Item description"
                                value="{{ $item->title }}"
                                class="flex-1 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <select name="items[{{ $index }}][column_number]"
                                class="bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                <option value="1" {{ $item->column_number == 1 ? 'selected' : '' }}>Column 1</option>
                                <option value="2" {{ $item->column_number == 2 ? 'selected' : '' }}>Column 2</option>
                                <option value="3" {{ $item->column_number == 3 ? 'selected' : '' }}>Column 3</option>
                            </select>
                            <input type="number" name="items[{{ $index }}][item_order]" value="{{ $item->item_order }}"
                                placeholder="Order"
                                class="w-20 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <button type="button" onclick="this.parentElement.remove()"
                                class="p-2 text-red-500 hover:bg-red-50 rounded transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.services.index') }}"
                    class="bg-slate-200 text-slate-700 px-8 py-3 rounded-lg font-bold hover:bg-slate-300 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-violet-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-violet-700 transition">
                    Update Service
                </button>
            </div>
        </form>
    </div>

    <script>
        let itemIndex = {{ $service->items->count() }};

        function addServiceItem() {
            const container = document.getElementById('service-items-container');
            const itemHtml = `
                        <div class="flex gap-3 items-start bg-slate-50 p-3 rounded-lg service-item">
                            <input type="text" name="items[${itemIndex}][title]" placeholder="Item description"
                                class="flex-1 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <select name="items[${itemIndex}][column_number]"
                                class="bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                                <option value="1">Column 1</option>
                                <option value="2">Column 2</option>
                                <option value="3">Column 3</option>
                            </select>
                            <input type="number" name="items[${itemIndex}][item_order]" value="${itemIndex}" placeholder="Order"
                                class="w-20 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                            <button type="button" onclick="this.parentElement.remove()"
                                class="p-2 text-red-500 hover:bg-red-50 rounded transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
            container.insertAdjacentHTML('beforeend', itemHtml);
            itemIndex++;
        }
    </script>
@endsection