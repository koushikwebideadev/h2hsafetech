@extends('layouts.admin')
@section('title', 'Business Settings')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Business Settings</h1>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<!-- Tabs Navigation -->
    
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="settingsTab" data-tabs-toggle="#settingsTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 active-tab-btn border-violet-600 text-violet-600" id="general-tab" data-tabs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true" onclick="switchTab('general')">General</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="logos-tab" data-tabs-target="#logos" type="button" role="tab" aria-controls="logos" aria-selected="false" onclick="switchTab('logos')">Logos & Favicon</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="mail-tab" data-tabs-target="#mail" type="button" role="tab" aria-controls="mail" aria-selected="false" onclick="switchTab('mail')">Mail Config</button>
            </li>
             <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="social-tab" data-tabs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false" onclick="switchTab('social')">Social Connections</button>
            </li>
             <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="footer-tab" data-tabs-target="#footer" type="button" role="tab" aria-controls="footer" aria-selected="false" onclick="switchTab('footer')">Footer</button>
            </li>
        </ul>
    </div>
    
    <div id="settingsTabContent">
        <!-- General Settings -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="general" role="tabpanel" aria-labelledby="general-tab" style="display: block;">
             <form action="{{ route('admin.business-settings.update') }}" method="POST">
                @csrf
                <div class="glass-card p-6 space-y-4">
                    <h3 class="text-lg font-semibold mb-4">Company Information</h3>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Company Name</label>
                        <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Company Email</label>
                        <input type="text" name="company_email" value="{{ $settings['company_email'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Company Phone</label>
                        <input type="text" name="company_phone" value="{{ $settings['company_phone'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn-premium">
                            Save General Settings
                        </button>
                    </div>
                </div>
             </form>
        </div>
        
        <!-- Logos -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="logos" role="tabpanel" aria-labelledby="logos-tab">
            <form action="{{ route('admin.business-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="glass-card p-6 space-y-6">
                     @php
                        $webLogo = isset($settings['company_web_logo']) ? json_decode($settings['company_web_logo'], true) : null;
                        $footerLogo = isset($settings['company_footer_logo']) ? json_decode($settings['company_footer_logo'], true) : null;
                        $favIcon = isset($settings['company_fav_icon']) ? json_decode($settings['company_fav_icon'], true) : null;
                    @endphp
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Web Logo</label>
                        @if($webLogo && isset($webLogo['image_name']))
                            <div class="mb-2">
                                <img src="{{ isset($webLogo['storage']) && $webLogo['storage'] == 'assets/images' ? asset('assets/images/' . $webLogo['image_name']) : asset('storage/' . $webLogo['image_name']) }}" alt="Web Logo" class="h-16 object-contain bg-gray-100 p-2 rounded">
                            </div>
                        @endif
                        <input type="file" name="company_web_logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Footer Logo</label>
                         @if($footerLogo && isset($footerLogo['image_name']))
                            <div class="mb-2">
                                <img src="{{ isset($footerLogo['storage']) && $footerLogo['storage'] == 'assets/images' ? asset('assets/images/' . $footerLogo['image_name']) : asset('storage/' . $footerLogo['image_name']) }}" alt="Footer Logo" class="h-16 object-contain bg-gray-100 p-2 rounded">
                            </div>
                        @endif
                        <input type="file" name="company_footer_logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Favicon</label>
                         @if($favIcon && isset($favIcon['image_name']))
                            <div class="mb-2">
                                <img src="{{ isset($favIcon['storage']) && $favIcon['storage'] == 'assets/images' ? asset('assets/images/' . $favIcon['image_name']) : asset('storage/' . $favIcon['image_name']) }}" alt="Favicon" class="h-10 w-10 object-contain bg-gray-100 p-2 rounded">
                            </div>
                        @endif
                        <input type="file" name="company_fav_icon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn-premium">
                            Save Logos
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Mail Config -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="mail" role="tabpanel" aria-labelledby="mail-tab">
            <form action="{{ route('admin.business-settings.update') }}" method="POST">
                @csrf
                <div class="glass-card p-6 space-y-4">
                    @php
                        $mail = isset($settings['mail_config']) ? json_decode($settings['mail_config'], true) : [];
                    @endphp
                    
                    <h3 class="text-lg font-semibold mb-4">SMTP Configuration</h3>
                    
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="mail_config[status]" value="1" id="mail_status" class="mr-2" {{ isset($mail['status']) && $mail['status'] == '1' ? 'checked' : '' }}>
                        <label for="mail_status" class="text-gray-700 text-sm font-bold">Enable SMTP</label>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Driver</label>
                            <input type="text" name="mail_config[driver]" value="{{ $mail['driver'] ?? 'smtp' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Host</label>
                            <input type="text" name="mail_config[host]" value="{{ $mail['host'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Port</label>
                            <input type="text" name="mail_config[port]" value="{{ $mail['port'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Encryption</label>
                            <input type="text" name="mail_config[encryption]" value="{{ $mail['encryption'] ?? 'tls' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                            <input type="text" name="mail_config[username]" value="{{ $mail['username'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <input type="text" name="mail_config[password]" value="{{ $mail['password'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Mail From Name</label>
                            <input type="text" name="mail_config[name]" value="{{ $mail['name'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Mail From Email</label>
                            <input type="text" name="mail_config[email_id]" value="{{ $mail['email_id'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn-premium">
                            Save Mail Config
                        </button>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-6">
                        <h4 class="text-md font-bold mb-4">Send Test Mail</h4>
                        <div class="flex items-end gap-4">
                            <div class="flex-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Test Email Address</label>
                                <div class="flex gap-2">
                                    <input type="email" id="test_email" placeholder="Enter email to test" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <button type="button" onclick="sendTestEmail()" class="btn-premium whitespace-nowrap !bg-emerald-600 !shadow-emerald-500/30 hover:!bg-emerald-700">
                                        Send Test Mail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        
         <!-- Socials -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="social" role="tabpanel" aria-labelledby="social-tab">
             <form action="{{ route('admin.business-settings.update') }}" method="POST">
                @csrf
                <div class="glass-card p-6 space-y-4">
                     @php
                        $whatsapp = isset($settings['whatsapp']) ? json_decode($settings['whatsapp'], true) : [];
                        $socials = isset($settings['social_links']) ? json_decode($settings['social_links'], true) : [];
                    @endphp
                    
                    <h3 class="text-lg font-semibold mb-4">WhatsApp Configuration</h3>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" name="whatsapp[status]" value="1" id="whatsapp_status" class="mr-2" {{ isset($whatsapp['status']) && $whatsapp['status'] == '1' ? 'checked' : '' }}>
                        <label for="whatsapp_status" class="text-gray-700 text-sm font-bold">Enable WhatsApp Support</label>
                    </div>
                    <div>
                         <label class="block text-gray-700 text-sm font-bold mb-2">WhatsApp Number</label>
                         <input type="text" name="whatsapp[phone]" value="{{ $whatsapp['phone'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <h3 class="text-lg font-semibold mb-4 mt-6">Social Media Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Facebook</label>
                            <input type="text" name="social_links[facebook]" value="{{ $socials['facebook'] ?? '' }}" placeholder="https://facebook.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Twitter</label>
                            <input type="text" name="social_links[twitter]" value="{{ $socials['twitter'] ?? '' }}" placeholder="https://twitter.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">LinkedIn</label>
                            <input type="text" name="social_links[linkedin]" value="{{ $socials['linkedin'] ?? '' }}" placeholder="https://linkedin.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Instagram</label>
                            <input type="text" name="social_links[instagram]" value="{{ $socials['instagram'] ?? '' }}" placeholder="https://instagram.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn-premium">
                            Save Social Links
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer Settings -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="footer" role="tabpanel" aria-labelledby="footer-tab">
             <form action="{{ route('admin.business-settings.update') }}" method="POST">
                @csrf
                <div class="glass-card p-6 space-y-4">
                    <h3 class="text-lg font-semibold mb-4">Footer Content</h3>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Footer Description</label>
                        <textarea name="footer_description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $settings['footer_description'] ?? '' }}</textarea>
                        <p class="text-gray-500 text-xs italic">Text displayed below the logo in the footer.</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Company Address</label>
                        <textarea name="company_address" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $settings['company_address'] ?? '' }}</textarea>
                        <p class="text-gray-500 text-xs italic">Shown on the Contact page and in the footer.</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Contact Page Map (Google Maps embed URL)</label>
                        <input type="url" name="contact_map_embed_url" value="{{ $settings['contact_map_embed_url'] ?? '' }}" placeholder="https://www.google.com/maps/embed?pb=..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-xs italic">Paste the iframe src URL from Google Maps embed. Leave empty to hide the map on the Contact page.</p>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <h4 class="text-md font-bold mb-2">Quick Links Manager</h4>
                        <div id="quick-links-container" class="space-y-2">
                            @php
                                $quickLinks = isset($settings['quick_links']) ? json_decode($settings['quick_links'], true) : [];
                            @endphp
                            @foreach($quickLinks as $index => $link)
                                <div class="flex gap-2 items-center quick-link-row">
                                    <input type="text" name="quick_links[{{ $index }}][label]" value="{{ $link['label'] ?? '' }}" placeholder="Label (e.g. About Us)" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <input type="text" name="quick_links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" placeholder="URL" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)"><i class="fas fa-trash"></i></button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="mt-2 text-sm text-violet-600 hover:text-violet-800 font-medium" onclick="addLinkRow('quick-links-container', 'quick_links')">+ Add Quick Link</button>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <h4 class="text-md font-bold mb-2">Footer Features Manager</h4>
                        <p class="text-xs text-gray-500 mb-2">If left empty, the top 5 default features will be shown.</p>
                        <div id="footer-features-container" class="space-y-2">
                            @php
                                $footerFeaturesSettings = isset($settings['footer_features']) ? json_decode($settings['footer_features'], true) : [];
                            @endphp
                            @foreach($footerFeaturesSettings as $index => $link)
                                 <div class="flex gap-2 items-center footer-feature-row">
                                    <input type="text" name="footer_features[{{ $index }}][label]" value="{{ $link['label'] ?? '' }}" placeholder="Label" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <input type="text" name="footer_features[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" placeholder="URL (e.g. # or full link)" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)"><i class="fas fa-trash"></i></button>
                                </div>
                            @endforeach
                        </div>
                         <button type="button" class="mt-2 text-sm text-violet-600 hover:text-violet-800 font-medium" onclick="addLinkRow('footer-features-container', 'footer_features')">+ Add Feature Link</button>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Copyright Text</label>
                        <input type="text" name="company_copyright_text" value="{{ $settings['company_copyright_text'] ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                     <div class="mt-4">
                        <button type="submit" class="btn-premium">
                            Save Footer Settings
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
    <!-- Button removed from here -->

<form id="test-mail-form" action="{{ route('admin.business-settings.test-mail') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="email" id="form_test_email">
</form>

@push('scripts')
<script>
    function switchTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('#settingsTabContent > div').forEach(div => {
            div.classList.add('hidden');
            div.style.display = 'none';
        });
        
        // Show selected tab content
        const selectedTab = document.getElementById(tabId);
        selectedTab.classList.remove('hidden');
        selectedTab.style.display = 'block';

        // Reset tab classes
        document.querySelectorAll('#settingsTab button').forEach(btn => {
            btn.classList.remove('border-violet-600', 'text-violet-600', 'active-tab-btn');
            btn.classList.add('border-transparent', 'hover:border-gray-300');
        });

        // Set active tab class
        const activeBtn = document.getElementById(tabId + '-tab');
        activeBtn.classList.remove('border-transparent', 'hover:border-gray-300');
        activeBtn.classList.add('border-violet-600', 'text-violet-600', 'active-tab-btn');
    }

    function addLinkRow(containerId, fieldName) {
        const container = document.getElementById(containerId);
        const index = container.children.length;
        const div = document.createElement('div');
        div.className = 'flex gap-2 items-center mt-2';
        div.innerHTML = `
            <input type="text" name="${fieldName}[${index}][label]" placeholder="Label" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <input type="text" name="${fieldName}[${index}][url]" placeholder="URL" class="shadow appearance-none border rounded flex-1 py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)"><i class="fas fa-trash"></i></button>
        `;
        container.appendChild(div);
    }

    function removeRow(btn) {
        btn.parentElement.remove();
    }

    function sendTestEmail() {
        const email = document.getElementById('test_email').value;
        if (!email) {
            alert('Please enter an email address');
            return;
        }
        document.getElementById('form_test_email').value = email;
        document.getElementById('test-mail-form').submit();
    }
</script>
@endpush
@endsection
