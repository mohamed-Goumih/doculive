<x-app-layout>
    <x-slot name="header">
        {{ $document->title }}
    </x-slot>

    <p>{{ $document->description }}</p>
    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">📥 Télécharger</a>

    <hr>

    <h5>💬 Commentaires</h5>

    <div id="comments">
        @foreach ($document->comments as $comment)
            <div class="alert alert-secondary">
                <b>{{ $comment->user->name }} :</b> {{ $comment->content }}
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('comments.store') }}" id="comment-form">
        @csrf
        <input type="hidden" name="document_id" value="{{ $document->id }}">
        <textarea name="content" class="form-control mb-2" placeholder="Ajouter un commentaire..." required></textarea>
        <button class="btn btn-primary">💬 Poster</button>
    </form>

    <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.1/echo.iife.js"></script>
    {{-- <script>
        window.Echo.channel('document.{{ $document->id }}')
            .listen('.comment.posted', (e) => {
                let html = `<div class="alert alert-success"><b>${e.user_name} :</b> ${e.content}</div>`;
                document.getElementById('comments').innerHTML += html;
            });
    </script> --}}

    <script>
        window.Echo.channel('document.{{ $document->id }}')
            .listen('.comment.posted', function (e) {
                const container = document.getElementById('comments');
                const html = `
                    <div class="alert alert-secondary">
                        <b>${e.user_name} :</b> ${e.content}
                    </div>
                `;
                container.innerHTML += html;
        
                // Optionnel : scroll vers le bas
                container.scrollTop = container.scrollHeight;
            });
        </script>
        
</x-app-layout>
