<!DOCTYPE html>
<x-app-layout>
    <div class="container">
        <h1>All User</h1>

        @foreach($users as $user)
        {{-- <li><a href="/users/{{$user->username}}">{{$user->name}}</a></li> --}}

        {{-- <li><a href="{{route('users.show', $user->username)}}">{{$user->name}}</a></li> --}}
        <li><a href="{{route('users.show', $user)}}">{{$user->name}}</a></li>
        @endforeach

        {{-- ========================================================== --}}

        <div class="container">
            <div class="card">
                <div class="card-header">ini post lho</div>
                <div class="card-body">
                @foreach($users as $user)
                    <li><a href="{{route('users.post', $user)}}">{{$user->name}}</a></li>
                @endforeach
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>descrpition</th>
                        </tr>
                    </thead>
                    @foreach($posts as $post )
                    <tr>
                        <td>{{$post->title}}</td>
                        {{-- <td>{{$user->countryName}}</td> --}}
                        <td>{{$post->body ?? 'No category'}}</td>
                        {{-- {{dd($user)}} --}}

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kriteria</th>
                </tr>
            </thead>
            @foreach($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                {{-- <td>{{$user->countryName}}</td> --}}
                <td>{{$user->criteria->kriteria ?? 'No category'}}</td>
                {{-- {{dd($user)}} --}}

            </tr>
            @endforeach
        </table>

        {{-- ========================================================== --}}



    </div>
</x-app-layout>
