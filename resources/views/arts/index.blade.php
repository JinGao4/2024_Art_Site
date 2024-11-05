<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Art') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="front-semibold text-lg mb-4">List of Arts:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($arts as $art)
                            <a href="{{route('arts.show',$art)}}">
                                <x-art-card 
                                    :title='$art->title'
                                    :image='$art->image'
                                />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>