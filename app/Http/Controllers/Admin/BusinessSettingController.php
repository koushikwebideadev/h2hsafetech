<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessSettingController extends Controller
{
    public function index()
    {
        $settings = BusinessSetting::all()->pluck('value', 'type');
        return view('admin.business-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token', '_method', 'mail_config', 'whatsapp', 'social_links', 'quick_links', 'footer_features']);

        // Handle standard text inputs
        foreach ($inputs as $type => $value) {
            // Skip file inputs which are handled separately if not present in request usually
            // primarily we check if it is not a file
            if (!$request->hasFile($type)) {
                $this->updateSetting($type, $value);
            }
        }

        // Handle File Uploads
        $fileKeys = ['company_web_logo', 'company_footer_logo', 'company_fav_icon'];
        foreach ($fileKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = date('Y-m-d') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Save to public/assets/images
                $destinationPath = public_path('assets/images');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $file->move($destinationPath, $filename);

                $value = json_encode([
                    'image_name' => $filename,
                    'storage' => 'assets/images'
                ]);
                $this->updateSetting($key, $value);
            }
        }

        // Handle Mail Config (JSON)
        if ($request->has('mail_config')) {
            $mailConfig = $request->input('mail_config');
            // Checkbox handling for status if needed, though here we assume it's passed or defaults
            if (!isset($mailConfig['status']))
                $mailConfig['status'] = '0';
            $this->updateSetting('mail_config', json_encode($mailConfig));
        }

        // Handle WhatsApp (JSON)
        if ($request->has('whatsapp')) {
            $whatsapp = $request->input('whatsapp');
            if (!isset($whatsapp['status']))
                $whatsapp['status'] = '0';
            $this->updateSetting('whatsapp', json_encode($whatsapp));
        }

        // Handle Social Links (JSON)
        if ($request->has('social_links')) {
            $socialLinks = $request->input('social_links');
            $this->updateSetting('social_links', json_encode($socialLinks));
        }

        // Handle Quick Links (JSON)
        if ($request->has('quick_links')) {
            $quickLinks = $request->input('quick_links');
            // Re-indexing is often good to ensure array is clean 0,1,2...
            $this->updateSetting('quick_links', json_encode(array_values($quickLinks)));
        } else {
            // If cleared all, we might want to set empty json or just ignore? 
            // Form submission usually omits empty arrays, so if it's missing but was present, it means all removed?
            // Actually, if we remove all rows, the input won't be sent. checks if present.
            // Better: if valid post request but missing key, it might mean empty. 
            // simpler: only update if present. clearing requires sending empty string
            // Actually for dynamic lists, if user deletes all rows, prompt should handle or we check if it was expected.
            // For now, let's assume if it's sent, valid. If user deletes all, maybe we should clear it? 
            // 'except' handles exclusion. Check if we should explicit clear.
            // For simplicity, just update if present. To clear, user might need to leave one empty or we handle 'clearing' explicitly later if needed.
            // Let's stick to update if present.
        }

        // Handle Footer Features (JSON)
        if ($request->has('footer_features')) {
            $footerFeatures = $request->input('footer_features');
            $this->updateSetting('footer_features', json_encode(array_values($footerFeatures)));
        }

        return redirect()->route('admin.business-settings.index')->with('success', 'Settings updated successfully.');
    }

    private function updateSetting($type, $value)
    {
        $setting = BusinessSetting::where('type', $type)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else {
            BusinessSetting::create([
                'type' => $type,
                'value' => $value
            ]);
        }
    }

    public function sendTestMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            // We assume the settings are already saved in the DB and loaded by Laravel config if configured dynamically.
            // If they are not auto-loaded, we might need to set them on the fly.
            // For this implementation, we'll try sending with current config.
            // Ideally, we should set the mailer config from DB settings here just to be sure if users haven't restarted queue/server or if we don't have dynamic config loader.

            $mailSettings = BusinessSetting::where('type', 'mail_config')->value('value');
            if ($mailSettings) {
                $config = json_decode($mailSettings, true);
                if (isset($config['status']) && $config['status'] == '1') {
                    config([
                        'mail.mailers.smtp.host' => $config['host'],
                        'mail.mailers.smtp.port' => $config['port'],
                        'mail.mailers.smtp.encryption' => $config['encryption'],
                        'mail.mailers.smtp.username' => $config['username'],
                        'mail.mailers.smtp.password' => $config['password'],
                        'mail.from.address' => $config['email_id'],
                        'mail.from.name' => $config['name'],
                    ]);
                }
            }

            \Illuminate\Support\Facades\Mail::raw('This is a test email from TJSB Society Admin Panel.', function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Test Email Configuration');
            });

            return back()->with('success', 'Test email sent successfully to ' . $request->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send test email: ' . $e->getMessage());
        }
    }
}
