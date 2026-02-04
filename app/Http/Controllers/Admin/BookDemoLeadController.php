<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookDemoLead;
use Illuminate\Http\Request;

class BookDemoLeadController extends Controller
{
    public function index()
    {
        $leads = BookDemoLead::latest()->get();
        return view('admin.book-demo-leads.index', compact('leads'));
    }

    public function destroy(BookDemoLead $bookDemoLead)
    {
        $bookDemoLead->delete();
        return redirect()->route('admin.book-demo-leads.index')->with('success', 'Lead deleted successfully.');
    }
}
