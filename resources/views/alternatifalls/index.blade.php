<!DOCTYPE html>
<html lang="en">
<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- @include('criterias._create') --}}

                <div class="card">
                    <div class="card-header">Create New Task</div>
                    <div class="card-body">

                        {{-- <form action="/tasks" method="post" class="d-flex"> --}}
                        <form action="{{route('alternatifalls.store')}}" method="post">
                            @csrf

                            {{-- @include('tasks._form', [
                            'task' => new App\Models\Task,  
                             ]) --}}
                            {{-- @include('tasks._form') --}}
                            <div class="mb-2">
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="position-option">Pekerjaan</label>
                                        <select class="form-control" id="position-option " name="criterias_pekerjaan">
                                            @for ($x = 0 ; $x < count($criterias_pekerjaan) ; $x++)
                                            <option value="{{ $criterias_pekerjaan[$x]["id"] }}">{{ $criterias_pekerjaan[$x]["nama"] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="position-option">Penghasilan</label>
                                        <select class="form-control" id="position-option " name="criterias_penghasilan">
                                            @for ($x = 0 ; $x < count($criterias_penghasilan) ; $x++)
                                            <option value="{{ $criterias_penghasilan[$x]["id"] }}">{{ $criterias_penghasilan[$x]["nama"] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="position-option">Kepemilikan Rumah</label>
                                        <select class="form-control" id="position-option " name="criterias_aset">
                                            @for ($x = 0 ; $x < count($criterias_aset) ; $x++)
                                            <option value="{{ $criterias_aset[$x]["id"] }}">{{ $criterias_aset[$x]["nama"] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="position-option">Tanggungan</label>
                                        <select class="form-control" id="position-option " name="criterias_beban">
                                        @for ($x = 0 ; $x < count($criterias_beban) ; $x++)
                                            <option value="{{ $criterias_beban[$x]["id"] }}">{{ $criterias_beban[$x]["nama"] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="position-option">Domisili</label>
                                        <select class="form-control" id="position-option " name="criterias_domisili">
                                            @for ($x = 0 ; $x < count($criterias_domisili) ; $x++)
                                            <option value="{{ $criterias_domisili[$x]["id"] }}">{{ $criterias_domisili[$x]["nama"] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            <div class="mb-2">

                                <h5> Nama warga</h5>
                                <input type="text" name="name_warga" class="form-control" value="{{$alternatifall->name_warga}}" placeholder="the name of the name warga">
                            </div>
                    </div>
                    <button class="btn btn-primary" type="submit">{{$submit}}</button>


                    </form>
                </div>

            </div>


            <div class="card">
                <div class="card-header">Alternatif All</div>
                <div class="card-body">
                    <ul class="list-group mt-4">



                        <li class="list-group-item d-flex align-items-center justify-content-between">


                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    @foreach($criterias as $criteria )
                                        <th>{{$criteria->kriteria}}</th>
                                    @endforeach
                                    {{-- <th>Bobot</th> --}}
                                </tr>
                                </thead>
                                @php
                                    $hitung=1;
                                @endphp
                                @foreach($alter as $alt => $a)
                                    <tr>
                                        <td>{{ $hitung++ }}</td>
                                        <td>{{ $a["name_warga"] }}</td>
                                        <td>{{ $a["Pekerjaan"] }}</td>
                                        <td>{{ $a["Penghasilan"] }}</td>
                                        <td>{{ $a["Kepemilikan Rumah"] }}</td>
                                        <td>{{ $a["Tanggungan"] }}</td>
                                        <td>{{ $a["Domisili"] }}</td>
                                        {{-- <td>{{ $finalvektor[$hitung-2] }}</td> --}}
                                        <td>
                                            <form action="{{route( 'alternatifalls.destroy',$a["name_warga"])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>
                                        </td>
                    
                                    </tr>
                                @endforeach
                                <ul>
                        {{-- @for($s=0; $s<count($finalvektor);$s++  )
                            <li>{{$finalvektor[$s]}}</li>
                        @endfor --}}
                                <td>
                                    <div class="d-flex">
                                        
                                        {{-- <a class="btn btn-primary me-2" href="/tasks/{{$task->id}}/edit">edit</a> --}}
                                        {{-- <a class="btn btn-primary me-2" href="{{route('alternatifalls.edit', $subcriteria->id)}}">edit</a> --}}
                                        
                                        {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                                            
                                            {{-- <form action="{{route( 'alternatifalls.destroy',$a["name_warga"])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form> --}}
                                    </div>
                                </td>

                    </tr>

                            </table>

                        </li>

                    </ul>

                </div>
            </div>

              <div class="card">
                <div class="card-header">Alternatif All</div>
                <div class="card-body">
                    {{-- <ul>
                        @for($s=0; $s<count($finalvektor);$s++  )
                            <li>{{$finalvektor[$s]}}</li>
                        @endfor

                    </tr> --}}
                    <ul class="list-group mt-4">



                        <li class="list-group-item d-flex align-items-center justify-content-between">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                @php
                                    $hitung=1;
                                @endphp
                                @foreach($alter as $alt => $a)
                                    <tr>
                                        <td>{{ $hitung++ }}</td>
                                        <td>{{ $finalvektor[$hitung-2] }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Max : {{$max}}</td>
                                        <td>Min : {{$min}}</td>
                                    </tr>
                                
                            </table>
                            
                        </li>
                        
                    </ul>

                </div>
                <div class="card-body">
                    <ul class="list-group mt-4">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                    @php
                                        $hitung=1;
                                    @endphp
                                    @foreach($alter as $alt => $a)
                                        <tr>
                                            <td>{{ $hitung++ }}</td>
                                            <td>{{ $finalvektor[$hitung-2] }}</td>
                                        </tr>
                                    @endforeach

                            </table>
                            

                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
