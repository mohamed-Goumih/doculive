<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
{
    $documents = Document::latest()->get();
    return view('documents.index', compact('documents'));
}

public function create()
{
    return view('documents.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable',
        'file' => 'required|file',
    ]);

    $path = $request->file('file')->store('documents', 'public');

    Document::create([
        'title' => $data['title'],
        'description' => $data['description'],
        'file_path' => $path,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('documents.index')
    ->with('success', 'Document ajouté');
}

public function show(Document $document)
{
    return view('documents.show', compact('document'));
}

}
