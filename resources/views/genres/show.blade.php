<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('All genre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="front-semibold text-lg mb-4">genre Details</h3>

                    <x-genre-details 
                        :name='$genre->name'
                        :about='$genre->about'
                        :image='$genre->image'
                    />

                    <div class="container">
                        <h2 class="text-xl mt-4 font-semibold">Arts in this Genre:</h2>
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @forelse ($genre->arts as $art)
                            <x-art-card 
                                :title="$art->title" 
                                :image="$art->image" 
                            />
                            @empty
                        <p>There are no performances associated with this genre..</p>
                        @endforelse
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>