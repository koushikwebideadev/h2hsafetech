<?php

namespace App\Http\Controllers;

use App\Models\BookDemoLead;
use Illuminate\Http\Request;

class BookDemoController extends Controller
{
    public function index()
    {
        return view('book-demo');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_no' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'preferred_mode_of_call' => 'required|string|in:Skype,Zoom,WhatsApp,Google Meet,MS Teams',
        ]);

        BookDemoLead::create($validatedData);

        return redirect()->back()->with('success', 'Thank you for your interest! We will contact you shortly.');
    }
}
