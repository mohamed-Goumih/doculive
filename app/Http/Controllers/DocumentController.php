<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller

{
//     public function index()
// {
//     $documents = Document::latest()->get();
//     return view('documents.index', compact('documents'));
// }

public function index(Request $request)
{
    $query = Document::query();

    if ($request->has('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $documents = $query->latest()->get();

    return view('documents.index', compact('documents'));
}

public function adminIndex(Request $request)
{
    $documents = Document::with('user')->latest()->get();

    return view('admin.documents', compact('documents'));
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

public function edit(Document $document)
{
    $this->authorize('update', $document);
    return view('documents.edit', compact('document'));
}

public function update(Request $request, Document $document)
{
    $this->authorize('update', $document);

    $data = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable',
    ]);

    $document->update($data);

    return redirect()->route('documents.index')->with('toast', [
        'message' => '📄 Document mis à jour.',
        'type' => 'info',
    ]);
}

public function destroy(Document $document)
{
    $this->authorize('delete', $document);

    Storage::disk('public')->delete($document->file_path);
    $document->delete();

    return redirect()->route('documents.index')->with('toast', [
        'message' => '🗑️ Document supprimé.',
        'type' => 'danger',
    ]);
}


}
