<div id="comments">
    <h5>💬 Commentaires</h5>

    @foreach ($comments as $comment)
        <div class="alert alert-secondary">
            <b>{{ $comment['user']['name'] }} :</b> {{ $comment['content'] }}
        </div>
    @endforeach

    <form wire:submit="post">
        <textarea wire:model.defer="content" class="form-control my-2" placeholder="Ajouter un commentaire..."></textarea>
        <button type="submit" class="btn btn-primary">Poster</button>
    </form>
</div>
