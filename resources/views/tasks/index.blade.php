<!DOCTYPE html>
<html lang="en">
<x-app-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @include('tasks._create')

      </div>

    </div>

    {{-- <div style="margin-left: 15px">
        <ol>
            @foreach ($tasks as $task)
            <li>{{$task -> list}}</li>

        @endforeach
        </ol>
    </div> --}}

    <ul class="list-group mt-4">

      @foreach ($tasks as $index => $task)
        <li class="list-group-item d-flex align-items-center justify-content-between">

          {{ $index + 1 }} - {{ $task->list }}

          <div class="d-flex">

            {{-- <a class="btn btn-primary me-2" href="/tasks/{{$task->id}}/edit">edit</a> --}}
            <a class="btn btn-primary me-2" href="{{ route('tasks.edit', $task->id) }}">edit</a>

            {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-danger" type="submit">delete</button>
            </form>

          </div>
        </li>
      @endforeach

    </ul>
  </div>
</x-app-layout>
