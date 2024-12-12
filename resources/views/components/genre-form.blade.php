@props(['action','method' , 'genre'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Genre</label>
        <input 
            type="string"
            name="name"
            id="name"
            value="{{old('name', $genre->name ?? '') }}"
            required
            class="mt-1 block W-full border-gray-300 rounded-md shadow-sm "/>
        @error('name')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">genre Piece image</label>
        <input 
            type="file"
            name="image"
            id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('image')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    @isset($genre->image)
        <div class="mb-4">
        <img src="{{ asset($image) }}" alt="{{ $name }}" alt="$genre->name" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div class="mb-4">
        <label for="about" class="block text-sm text-gray-700">About:</label>
        <input 
            type="text"
            name="about"
            id="about"
            value="{{old('about', $genre->about ?? '') }}"
            required
            class="mt-1 block W-full border-gray-300 rounded-md shadow-sm "/>
        @error('about')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{isset($genre) ? 'Update genre': 'Add genre'}}
        </x-primary-button>
    </div>
</form>