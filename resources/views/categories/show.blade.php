<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes for Category: {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($notes as $note)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6">
                    <h3 class="text-md font-semibold text-yellow-600">{{ $note->titre }}</h3>
                    <p class="text-gray-600">{{ $note->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
