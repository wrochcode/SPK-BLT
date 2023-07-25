<x-app-layout title="Contact Page">

    {{-- jika memakai yield and section --}}
    {{-- @section('styles')
        <style>
            body {
                background-color : indigo;
            }
        </style>
    @endsection --}}

    {{-- jika memakai {{}} dan slot --}}

    {{-- @slot('styles')
        <style>
            body {
                background-color : indigo;
            }
        </style>
    @endslot --}}

    <H1>Contact Page</H1>

    <form action="/contact" method="post">
        @csrf

        <button type="submit">Send</button>
    </form>

</x-app-layout>
