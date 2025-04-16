<x-app-layout>
    <x-slot name="header">
        {{ $document->title }}
    </x-slot>

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $document->title }}</h5>
                <p class="card-text">{{ $document->description }}</p>

                <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-outline-primary mb-3" target="_blank">
                    📥 Télécharger
                </a>

                <hr>

                {{-- Section commentaires avec Livewire --}}
                <livewire:comment-section :document="$document" wire:poll.1s />
                {{-- @livewire('comment-section', ['document' => $document]) --}}

            </div>
        </div>
    </div>

    {{-- Toast visual (facultatif mais recommandé) --}}
    <script>
        window.addEventListener('toast', event => {
            const message = event.detail.message;
            const type = event.detail.type || 'success';

            let toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0 show position-fixed bottom-0 end-0 m-3`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            document.body.appendChild(toast);
            new bootstrap.Toast(toast).show();

            setTimeout(() => toast.remove(), 6000);
        });
    </script>
</x-app-layout>
