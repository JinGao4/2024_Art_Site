@props(['action','method' , 'art','review'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Rating</label>
        <input 
            type="text"
            name="rating"
            id="rating"
            value="{{old('rating', $review->rating ?? '') }}"
            required
            class="mt-1 block W-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:borber-indigo-500"/>
        @error('rating')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Comment</label>
        <input 
            type="text"
            name="comment"
            id="comment"
            value="{{old('comment', $review->comment ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('comment')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{isset($review) ? 'Update Review': 'save Review'}}
        </x-primary-button>
    </div>
</form>