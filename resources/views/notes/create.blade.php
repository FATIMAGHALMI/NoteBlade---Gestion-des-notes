<!-- resources/views/notes/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Note') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                   
                    <form method="POST" action="{{ route('notes.store') }}">
                    @csrf

                    <!-- Titre de la note -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de la note :</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input w-full @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contenu de la note -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenu :</label>
                        <textarea id="content" name="content" rows="4" class="form-textarea w-full @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catégorie -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie :</label>
                        <select id="category_id" name="category_id" class="form-select w-full @error('category_id') border-red-500 @enderror">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded">
                            Créer Note
                        </button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
