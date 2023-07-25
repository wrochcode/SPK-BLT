<x-app-layout title="About Page" >
    
    {{-- jika memakai yield and section --}}
    {{-- @section('styles')
        <style>
            body {
                background-color : indigo;
            }
        </style>
    @endsection --}}

    {{-- jika memakai {{}} dan slot --}}

    @slot('styles')
        <style>
            body {
                background-color : indigo;
            }
        </style>
    @endslot

    <H1>About Page</H1>
</x-app-layout>