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
                <small class="text-muted">
                    Catégorie : {{ $doc->category?->name ?? 'Aucune' }}
                </small>
                
            </li>

            @can('update', $doc)
            <a href="{{ route('documents.edit', $doc) }}" class="btn btn-sm btn-warning">✏️</a>
        @endcan
        
        @can('delete', $doc)
            <form method="POST" action="{{ route('documents.destroy', $doc) }}" class="d-inline"
             onsubmit="return confirm('Supprimer ?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">🗑️</button>
            </form>
        @endcan

        @endforeach
    </ul>
</x-app-layout>
