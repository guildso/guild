<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ __('Your Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @livewire('posts')
    </div>
</x-app-layout>
