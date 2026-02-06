@extends('layouts.admin')
@section('title', 'Add Feature Category')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Add New Feature Category</h1>
            <p class="text-slate-500 text-sm">Create a new feature category for the features page.</p>
        </div>
        <a href="{{ route('admin.feature-categories.index') }}"
            class="bg-white text-slate-600 px-4 py-2 rounded-lg text-sm font-bold border border-slate-200 hover:bg-slate-50 transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="max-w-6xl">
        <form action="{{ route('admin.feature-categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="glass-card p-6 space-y-4">
                <h3 class="font-bold text-slate-700 mb-4">Basic Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Category Title</label>
                        <input type="text" name="title" placeholder="e.g., Society Share" value="{{ old('title') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Tab Order</label>
                        <input type="number" name="tab_order" value="{{ old('tab_order', 0) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100"
                            required>
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-violet-600 rounded">
                        <span class="text-sm font-bold text-slate-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="glass-card p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-700">Feature Items</h3>
                    <button type="button" onclick="addFeatureItem()"
                        class="bg-violet-100 text-violet-600 px-3 py-1 rounded text-sm font-bold hover:bg-violet-200 transition">
                        <i class="fas fa-plus"></i> Add Item
                    </button>
                </div>

                <div id="feature-items-container" class="space-y-3">
                    <!-- Items will be added here dynamically -->
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.feature-categories.index') }}"
                    class="bg-slate-200 text-slate-700 px-8 py-3 rounded-lg font-bold hover:bg-slate-300 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-violet-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-violet-700 transition">
                    Save Category
                </button>
            </div>
        </form>
    </div>

    <script>
        let itemIndex = 0;
        let editorInstances = {};

        function addFeatureItem() {
            const container = document.getElementById('feature-items-container');
            const editorId = `editor-${itemIndex}`;
            const itemHtml = `
                <div class="bg-slate-50 p-4 rounded-lg feature-item space-y-3" data-index="${itemIndex}">
                    <div class="grid grid-cols-12 gap-3">
                        <input type="text" name="items[${itemIndex}][icon]" placeholder="Icon class (e.g., fas fa-home)"
                            class="col-span-3 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="items[${itemIndex}][title]" placeholder="Feature title" required
                            class="col-span-4 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="text" name="items[${itemIndex}][description]" placeholder="Short Description"
                            class="col-span-4 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                        <input type="number" name="items[${itemIndex}][item_order]" value="${itemIndex}" placeholder="Order"
                            class="col-span-1 bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Long Description (for Read More popup)</label>
                        <textarea id="${editorId}" name="items[${itemIndex}][long_description]" 
                            class="ckeditor-editor w-full bg-white border border-slate-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-100" 
                            rows="4" placeholder="Enter detailed description..."></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="removeFeatureItem(this)"
                            class="px-3 py-1 text-sm text-red-500 hover:bg-red-50 rounded transition">
                            <i class="fas fa-trash"></i> Remove Item
                        </button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', itemHtml);
            
            // Initialize CKEditor for the newly added textarea
            initializeCKEditor(editorId);
            itemIndex++;
        }

        function removeFeatureItem(button) {
            const item = button.closest('.feature-item');
            const textarea = item.querySelector('.ckeditor-editor');
            if (textarea && editorInstances[textarea.id]) {
                editorInstances[textarea.id].destroy()
                    .then(() => {
                        delete editorInstances[textarea.id];
                        item.remove();
                    })
                    .catch(error => {
                        console.error('Error destroying editor:', error);
                        item.remove();
                    });
            } else {
                item.remove();
            }
        }

        function initializeCKEditor(editorId) {
            const element = document.getElementById(editorId);
            if (element && !editorInstances[editorId]) {
                ClassicEditor
                    .create(element, {
                        toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'underline', '|', 
                                  'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable'],
                        height: '200px'
                    })
                    .then(editor => {
                        editorInstances[editorId] = editor;
                    })
                    .catch(error => {
                        console.error('Error initializing CKEditor:', error);
                    });
            }
        }

        // Add initial items
        for (let i = 0; i < 3; i++) {
            addFeatureItem();
        }
    </script>
@endsection