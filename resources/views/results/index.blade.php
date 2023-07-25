<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                {{-- @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
                @endif --}}
                <div class="card">
                    <div class="card-header">Alternatif All</div>
                    <div class="card-body">

                        <ul class="list-group mt-4">



                            <li class="list-group-item d-flex align-items-center justify-content-between">


                                
                                 @foreach($alternatifalls as $index => $alternatifall )

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    {{-- <td>{{$alternatifall -> id}}</td> --}}
                                    <td> {{$alternatifall -> id_kriteria}}</td>
                                    <td> {{$alternatifall -> id_subkriteria}}</td>
                                    {{-- <td>{{ $index + 1 }} - {{$criteria -> kriteria}}</td> --}}
                                    {{-- <td>{{$user->countryName}}</td> --}}
                                    <td> {{$alternatifall -> name_warga}}</td>
                                    {{-- {{dd($index)}} --}}

                                    <td>
                                        <div class="d-flex">

                                            {{-- <a class="btn btn-primary me-2" href="/criterias/{{$criteria->id}}/edit">edit</a> --}}
                                            {{-- <a class="btn btn-primary me-2" href="{{route('criterias.edit', $criteria->id)}}">edit</a> --}}
                                            <a class="btn btn-primary me-2" href="{{route('alternatifalls.edit', $alternatifall->id)}}">edit</a>

                                            {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                                            <form action="{{route( 'alternatifalls.destroy',$alternatifall->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
