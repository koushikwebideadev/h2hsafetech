<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ $settings['company_name'] ?? 'TJSB Society' }}</title>
    @php
        $favIcon = isset($settings['company_fav_icon']) ? json_decode($settings['company_fav_icon'], true) : null;
        $favIconPath = ($favIcon && isset($favIcon['image_name']))
            ? (($favIcon['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $favIcon['image_name']) : asset('storage/' . $favIcon['image_name']))
            : null;
    @endphp
    @if($favIconPath)
        <link rel="icon" type="image/x-icon" href="{{ $favIconPath }}">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-premium {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #7c3aed;
            /* violet-600 */
            color: white;
            font-weight: 700;
            font-size: 0.875rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            /* rounded-xl */
            box-shadow: 0 10px 15px -3px rgba(124, 58, 237, 0.3);
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            width: 100%;
        }

        .btn-premium:hover {
            background-color: #6d28d9;
            /* violet-700 */
            box-shadow: 0 20px 25px -5px rgba(124, 58, 237, 0.4);
            transform: translateY(-2px);
        }

        .btn-premium:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body class="bg-slate-50 h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 max-w-md w-full border border-slate-100">
        <div class="text-center mb-8">
            @php
                $webLogo = isset($settings['company_web_logo']) ? json_decode($settings['company_web_logo'], true) : null;
                $webLogoPath = ($webLogo && isset($webLogo['image_name']))
                    ? (($webLogo['storage'] ?? 'public') == 'assets/images' ? asset('assets/images/' . $webLogo['image_name']) : asset('storage/' . $webLogo['image_name']))
                    : asset('assets/images/logo.png');
            @endphp
            <img src="{{ $webLogoPath }}" alt="{{ $settings['company_name'] ?? 'TJSB' }} Logo"
                class="h-16 w-auto mx-auto mb-4 object-contain" style="max-height: 64px;">
            <h1 class="text-2xl font-bold text-slate-800">Admin Login</h1>
            <p class="text-slate-500">Sign in to access your dashboard</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-xl relative mb-6 text-sm"
                role="alert">
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Email
                    Address</label>
                <input type="email" name="email" id="email"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all"
                    value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
            </div>

            <div class="mb-8">
                <label for="password"
                    class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all"
                    required placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="btn-premium">
                    Sign In to Dashboard
                </button>
            </div>
        </form>
    </div>

</body>

</html>