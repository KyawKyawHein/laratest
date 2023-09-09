<x-layout>

    <!-- alert section  -->
    @if(session("success"))
        <p class="alert alert-success p-3 text-center">{{session("success")}}</p>
    @endif

    <!-- hero section -->
    <x-hero/>

    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs"/>

    <!-- subscribe new blogs -->
    <x-subscribe/>
</x-layout>