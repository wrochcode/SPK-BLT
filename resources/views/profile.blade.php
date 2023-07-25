{{-- <x-app-layout title="Profile Page">
    <H1>Profile Page</H1>
</x-app-layout> --}}

<x-app-layout title="{{$username ?? 'Profile'}}">
    <H1>{{$username ?? 'Profile'}}</H1>
</x-app-layout>
