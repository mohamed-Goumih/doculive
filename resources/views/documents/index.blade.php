<x-app-layout>
    <x-slot name="header">📁 Tous les documents</x-slot>

    <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">➕ Nouveau document</a>

    <ul class="list-group">
        @foreach ($documents as $doc)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('documents.show', $doc) }}">{{ $doc->title }}</a>
                <small>{{ format_date_fr($doc->created_at) }}</small>
            </li>
        @endforeach
    </ul>
</x-app-layout>
    