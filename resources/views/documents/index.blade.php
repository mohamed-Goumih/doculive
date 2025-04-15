<x-app-layout>
    <x-slot name="header">📁 Tous les documents</x-slot>

    <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">➕ Nouveau document</a>

    <form method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="🔎 Rechercher un document..." value="{{ request('search') }}">
        <button class="btn btn-outline-primary">Rechercher</button>
    </form>
    

    <ul class="list-group">
        @foreach ($documents as $doc)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('documents.show', $doc) }}">{{ $doc->title }}</a>
                <small>{{ format_date_fr($doc->created_at) }}</small>
            </li>

<a href="{{ route('documents.edit', $doc) }}" class="btn btn-sm btn-outline-primary">✏️</a>

<form action="{{ route('documents.destroy', $doc) }}" method="POST" 
onsubmit="return confirm('Supprimer ce document ?');" class="d-inline">
    @csrf @method('DELETE')
    <button class="btn btn-sm btn-outline-danger">🗑️</button>
</form>

        @endforeach
    </ul>
</x-app-layout>
