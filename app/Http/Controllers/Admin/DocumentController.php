<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('creator')->latest()->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'nullable|string|max:255',
            'file' => 'required|file|max:10240',
            'date' => 'nullable|date',
        ]);

        $data = $request->only(['title', 'source', 'date']);
        $data['created_by'] = auth()->id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $filename, 'public');
            $data['file'] = $filename;
        }

        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document uploaded successfully.');
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:10240',
            'date' => 'nullable|date',
        ]);

        $data = $request->only(['title', 'source', 'date']);

        if ($request->hasFile('file')) {
            if ($document->file && Storage::disk('public')->exists('documents/' . $document->file)) {
                Storage::disk('public')->delete('documents/' . $document->file);
            }
            $file = $request->file('file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->storeAs('documents', $filename, 'public');
            $data['file'] = $filename;
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        if ($document->file && Storage::disk('public')->exists('documents/' . $document->file)) {
            Storage::disk('public')->delete('documents/' . $document->file);
        }
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully.');
    }
}
