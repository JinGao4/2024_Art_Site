@props(['title','image']) <!-- define props that are passed to this component -->

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <!-- this display's the following in to the art card -->
    <h4 class="font-bold text-lg">{{$title}}</h4>
    <img src="{{$image}}" alt="{{$title}}">
</div>