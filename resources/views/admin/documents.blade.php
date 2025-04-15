<x-app-layout>
    <x-slot name="header">📊 Dashboard Admin - Tous les documents</x-slot>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->title }}</td>
                    <td>{{ $doc->user->name }}</td>
                    <td>{{ format_date_fr($doc->created_at) }}</td>
                    <td>
                        <a href="{{ route('documents.show', $doc) }}" class="btn btn-sm btn-info">Voir</a>
                        <form action="{{ route('documents.destroy', $doc) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce document ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
