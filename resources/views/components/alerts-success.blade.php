
<!--  Check the 'success' message stored in the session -->
@if(session('success'))
<div class="mb-4 px-4 py-2 bg-green-100 border-green-500 text-green-700 rounded-md">
<!-- Output the success message from the session -->
    {{$slot}}
</div>
@endif

<!-- Custom Blade component that displays a success alert -->
<x-alert-success>
    {{session('success')}}
</x-alert-success>