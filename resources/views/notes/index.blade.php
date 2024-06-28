<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Notes') }}
        </h2>
    </x-slot>
    
    <div class="text-right mt-4">
        <a href="{{ route('notes.create') }}" class="text-yellow-800 hover:bg-yellow-400 mr-20 text-white font-bold py-2 px-4 rounded">
            Add Note
        </a>
    </div>
    
    <form action="{{ route('notes.index') }}" method="GET" class="mb-4 ml-80" id="searchForm">
        <div class="flex items-center max-w-xl">
            <input type="text" name="search" id="search" placeholder="Search notes" class="px-4 py-2 border border-gray-300 rounded-md w-full" value="{{ $search }}">
        </div>
    </form>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if ($search)
                         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                            @forelse($notes as $note)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                    <a href="{{ route('notes.show', $note) }}" class="text-yellow-500 text-center hover:text-yellow-400 text-lg font-semibold block">{{ $note->titre }}</a>
                                    <p class="text-gray-400 text-sm mt-2">{{ $note->content }}</p>
                                    <div class="flex justify-end mt-4 space-x-2">
                                        <a href="{{ route('notes.edit', $note) }}" class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold p-3 rounded-full flex items-center justify-center transition duration-300 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512" class="h-5 w-5">
                                                <path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6m156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8M460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-700 hover:bg-red-500 text-white font-bold rounded-full p-3 flex items-center justify-center transition duration-300 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                                                    <path fill-rule="evenodd" d="M7.616 20q-.691 0-1.153-.462T6 18.384V6H5V5h4v-.77h6V5h4v1h-1v12.385q0 .69-.462 1.153T16.384 20zm2.192-3h1V8h-1zm3.384 0h1V8h-1z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center text-gray-500">{{ __('No notes found') }}</div>
                            @endforelse
                        </div>
                        
                    @else
                        @foreach($categories as $category)
                            <h3 class="text-md font-semibold text-yellow-600 text-center mt-4">{{ $category->name }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                @forelse($category->notes as $note)
                                    <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                        <a href="{{ route('notes.show', $note) }}" class="text-yellow-500 text-center hover:text-blue-700 text-lg font-semibold block">{{ $note->titre }}</a>
                                        <p class="text-gray-400 text-sm mt-2">{{ $note->content }}</p>
                                        <div class="flex justify-end mt-4 space-x-2">
                                            <a href="{{ route('notes.edit', $note) }}" class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold p-3 rounded-full flex items-center justify-center transition duration-300 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512" class="h-5 w-5">
                                                    <path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6m156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8M460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-700 hover:bg-red-500 text-white font-bold rounded-full p-3 flex items-center justify-center transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                                                        <path fill-rule="evenodd" d="M7.616 20q-.691 0-1.153-.462T6 18.384V6H5V5h4v-.77h6V5h4v1h-1v12.385q0 .69-.462 1.153T16.384 20zm2.192-3h1V8h-1zm3.384 0h1V8h-1z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-full text-center text-gray-500">{{ __('No notes in this category') }}</div>
                                @endforelse
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
