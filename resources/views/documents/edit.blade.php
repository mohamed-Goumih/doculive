<x-app-layout>
    <x-slot name="header">✏️ Modifier Document</x-slot>

    <form method="POST" action="{{ route('documents.update', $document) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Titre</label>
            <input name="title" class="form-control" value="{{ $document->title }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $document->description }}</textarea>
        </div>
        <button class="btn btn-primary">✅ Mettre à jour</button>
    </form>
</x-app-layout>

