<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use Illuminate\Http\Request;

class ContactLeadController extends Controller
{
    public function index()
    {
        $leads = ContactLead::orderBy('created_at', 'desc')->get();
        return view('admin.contact-leads.index', compact('leads'));
    }

    public function show(ContactLead $contactLead)
    {
        $lead = $contactLead;
        return view('admin.contact-leads.show', compact('lead'));
    }

    public function destroy(ContactLead $contactLead)
    {
        $contactLead->delete();
        return redirect()->route('admin.contact-leads.index')->with('success', 'Contact lead deleted successfully.');
    }

    public function updateStatus(Request $request, ContactLead $contactLead)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,resolved'
        ]);

        $contactLead->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
