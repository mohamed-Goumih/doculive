<x-app-layout>
    <x-slot name="header">➕ Ajouter un document</x-slot>

    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Fichier</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button class="btn btn-success">📤 Enregistrer</button>
    </form>
</x-app-layout>
