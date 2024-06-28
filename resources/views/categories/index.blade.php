<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Categories') }}
        </h2>
    </x-slot>

    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8 max-w-xl">
        @foreach($categories as $category)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6">
            <h3 class="text-md font-semibold text-yellow-600 text-center">
    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
</h3>
 <div class="flex justify-end gap-2">
                    <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold p-3 rounded-full flex items-center justify-center transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512" class="h-5 w-5">
                            <path fill="currentColor" d="m402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6m156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8M460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9"/>
                        </svg>
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
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
        </div>
        @endforeach

        <div class="text-right mt-4">
            <a href="{{ route('categories.create') }}" class="text-yellow-800 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">
                Add Category
            </a>
        </div>
    </div>
</x-app-layout>
