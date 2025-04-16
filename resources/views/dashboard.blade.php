<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (auth()->user()->is_admin)
    <a href="{{ route('admin.documents') }}" 
    class="text-sm text-yellow-600 underline mt-3 block">
        🔐 Accès admin : tous les documents
    </a>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="header">📊 Tableau de bord</x-slot>

    <div class="p-4">
        <a href="{{ route('documents.index') }}" class="btn btn-outline-dark">
            📁 Gérer mes documents
        </a>
    </div>
</x-app-layout>
