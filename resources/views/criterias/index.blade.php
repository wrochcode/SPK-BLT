<!DOCTYPE html>
<html lang="en">
<x-app-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        {{-- @include('criterias._create') --}}

        <div class="card">
          <div class="card-header">Create New Task</div>
          <div class="card-body">

            {{-- <form action="/tasks" method="post" class="d-flex"> --}}
            <form action="{{ route('criterias.store') }}" method="post">
              @csrf

              {{-- @include('tasks._form', [
                            'task' => new App\Models\Task,  
                             ]) --}}
              {{-- @include('tasks._form') --}}
              <div class="mb-2">
                <div class="mb-2">
                  <h5> Kriteria</h5>
                  {{-- <input type="text" name="list" class="form-control @error('list') is-invalid @enderror" value="{{old('list', $task->list) }}" placeholder="the name of the task"> --}}
                  <input type="text" name="kriteria" class="form-control "
                    value="{{ old('kriteria', $criteria->kriteria) }}" placeholder="the name of the kriteria">
                </div>

                <div class="mb-2">

                  <h5> Bobot kriteria</h5>
                  <input type="text" name="bobot_kriteria" class="form-control"
                    value="{{ $criteria->bobot_kriteria }}" placeholder="the name of the bobot">
                </div>
              </div>
              <button class="btn btn-primary" type="submit">{{ $submit }}</button>

            </form>
          </div>

        </div>

        <div class="card">
          <div class="card-header">Criteria</div>
          <div class="card-body">

            <ul class="list-group mt-4">

              <li class="list-group-item d-flex align-items-center justify-content-between">

                <table class="table">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>id</th>
                      <th>Kriteria</th>
                      <th>Bobot Kriteria</th>
                    </tr>
                  </thead>
                  @foreach ($criterias as $index => $criteria)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $criteria->id }}</td>
                      <td> {{ $criteria->kriteria }}</td>
                      {{-- <td>{{ $index + 1 }} - {{$criteria -> kriteria}}</td> --}}
                      {{-- <td>{{$user->countryName}}</td> --}}
                      <td> {{ $criteria->bobot_kriteria }}</td>
                      {{-- {{dd($index)}} --}}

                      <td>
                        <div class="d-flex">

                          {{-- <a class="btn btn-primary me-2" href="/criterias/{{$criteria->id}}/edit">edit</a> --}}
                          {{-- <a class="btn btn-primary me-2" href="{{route('criterias.edit', $criteria->id)}}">edit</a> --}}
                          <a class="btn btn-primary me-2" href="{{ route('criterias.edit', $criteria->id) }}">edit</a>

                          {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                          <form action="{{ route('criterias.destroy', $criteria->id) }}" method="post">
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
