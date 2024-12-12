<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('genre') }}
        </h2>

        <form method="GET" action="{{ route('genres.index') }}" class="inline-form">
            <input class="px-2 py-2 bg-red-0 border border-black-500 text-green-700 rounded-md" type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Search name..." >
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="front-semibold text-lg mb-4">List of genres:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach($genres as $genre)
                            <div class = "border p-4 rounded-lg shadow-md">
                                <a href="{{route('genres.show' , $genre) }}">
                                    <x-genre-card 
                                        :name='$genre->name'
                                        :image='$genre->image'    
                                    />
                                </a>

                                @if(auth()->user()->role === 'admin')
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('genres.edit' , $genre)}}" class="text-gray-600 bg-orange-300 hover:bg orange-700 py-2 px-4 rounded">
                                        Edit
                                    </a>

                                    <form action="{{route('genres.destroy' , $genre) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this art piece?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-600 bg-red-300 hover:bg-red font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>