<!DOCTYPE html>
<html lang="en">
<x-app-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        {{-- @include('criterias._create') --}}

        <div class="card">
          <div class="card-header">Create New Sub</div>
          <div class="card-body">

            {{-- <div class="form-group">
                            <label for="position-option">Posisi</label>
                            <select class="form-control" id="position-option" name="position_id">
                                @foreach ($data as $k => $item)
                                <option value="{{ $item->kriteria_id }}">{{ $item->id }}</option>
                        @endforeach
                        </select>
                    </div> --}}

            {{-- <form action="/tasks" method="post" class="d-flex"> --}}
            <form action="{{ route('subcriterias.store') }}" method="post">
              @csrf

              {{-- @include('tasks._form', [
                            'task' => new App\Models\Task,  
                             ]) --}}
              {{-- @include('tasks._form') --}}
              <div class="mb-2">

                <div class="mb-2">
                  <div class="form-group">
                    <label for="position-option">Kriteria</label>
                    <select class="form-control" id="position-option" name="kriteria_id">
                      @foreach ($criterias as $k => $item)
                        <option value="{{ $item->id }}">{{ $item->kriteria }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- <div class="mb-2">
                                    <h5> Kriteria</h5>
                                    <input type="text" name="kriteria_id" class="form-control " value="{{$subcriteria->kriteria_id}}" placeholder="the name of the kriteria">
                        </div> --}}

                <div class="mb-2">
                  <h5> SubKriteria</h5>
                  <input type="text" name="sub_kriteria" class="form-control "
                    value="{{ $subcriteria->sub_kriteria }}" placeholder="the name of the subkriteria">
                </div>
                <div class="mb-2">

                  <h5> Nilai Skala</h5>
                  <input type="text" name="nilai_skala" class="form-control" value="{{ $subcriteria->nilai_skala }}"
                    placeholder="the name of the nilai skala">
                </div>
              </div>
              <button class="btn btn-primary" type="submit">{{ $submit }}</button>

            </form>
          </div>

        </div>

        <div class="card">
          <div class="card-header">SubCriteria</div>
          <div class="card-body">

            <ul class="list-group mt-4">

              <li class="list-group-item d-flex align-items-center justify-content-between">

                <table class="table">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Kriteria</th>
                      <th>Sub Kriteria</th>
                      <th>Nilai Skala</th>
                    </tr>
                  </thead>
                  @foreach ($subcriterias as $index => $subcriteria)
                    <tr>
                      <td>{{ $index + 1 }} </td>
                      <td>{{ $subcriteria->kriteria_id }}</td>
                      {{-- <td>{{$user->countryName}}</td> --}}
                      <td> {{ $subcriteria->sub_kriteria }}</td>
                      <td> {{ $subcriteria->nilai_skala }}</td>
                      {{-- {{dd($user)}} --}}

                      <td>
                        <div class="d-flex">

                          {{-- <a class="btn btn-primary me-2" href="/tasks/{{$task->id}}/edit">edit</a> --}}
                          <a class="btn btn-primary me-2"
                            href="{{ route('subcriterias.edit', $subcriteria->id) }}">edit</a>

                          {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                          <form action="{{ route('subcriterias.destroy', $subcriteria->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">delete</button>
                          </form>

                        </div>
                      </td>
                    </tr>
                  @endforeach

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
                      <th>id</th>
                      <th>Kriteria</th>

                    </tr>
                  </thead>
                  @foreach ($criterias as $index => $criteria)
                    <tr>
                      <td>{{ $criteria->id }}</td>
                      <td>{{ $criteria->kriteria }}</td>
                      {{-- <td>{{$user->countryName}}</td> --}}
                      {{-- <td> {{$subcriteria -> sub_kriteria}}</td>
                                <td> {{$subcriteria -> nilai_skala}}</td> --}}
                      {{-- {{dd($user)}} --}}

                      <td>
                        <div class="d-flex">

                          {{-- <a class="btn btn-primary me-2" href="/tasks/{{$task->id}}/edit">edit</a> --}}
                          <a class="btn btn-primary me-2"
                            href="{{ route('subcriterias.edit', $subcriteria->id) }}">edit</a>

                          {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                          <form action="{{ route('subcriterias.destroy', $subcriteria->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">delete</button>
                          </form>

                        </div>
                      </td>
                    </tr>
                  @endforeach

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
                      <th>no</th>
                      <th>k_id</th>
                      <th>id_kriteria</th>
                      <th>Kriteria</th>
                      <th>sub Kriteria</th>
                      <th>Nilai skala</th>

                    </tr>
                  </thead>
                  @foreach ($data as $k => $item)
                    <tr>
                      <td>{{ $k + 1 }}</td>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->kriteria_id }}</td>
                      <td>{{ $item->kriteria }}</td>
                      <td>{{ $item->sub_kriteria }}</td>
                      <td>{{ $item->nilai_skala }}</td>
                      {{-- <td>{{$user->countryName}}</td> --}}
                      {{-- <td> {{$subcriteria -> sub_kriteria}}</td>
                                <td> {{$subcriteria -> nilai_skala}}</td> --}}
                      {{-- {{dd($user)}} --}}

                      <td>
                        <div class="d-flex">

                          {{-- <a class="btn btn-primary me-2" href="/tasks/{{$task->id}}/edit">edit</a> --}}
                          <a class="btn btn-primary me-2"
                            href="{{ route('subcriterias.edit', $subcriteria->id) }}">edit</a>

                          {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                          <form action="{{ route('subcriterias.destroy', $subcriteria->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">delete</button>
                          </form>

                        </div>
                      </td>
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
