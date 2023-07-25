{{-- {{print_r($errors->all())}} --}}

<div class="card">
    <div class="card-header">Create New Task</div>
    <div class="card-body">

        {{-- menampilkan alert error --}}
        {{-- @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
    @endforeach --}}

    {{-- @if($errors->all())
    <div class="alert alert-danger">Your data was invalid</div>
    @endif --}}

    {{-- <form action="/tasks" method="post" class="d-flex"> --}}
    <form action="{{route('tasks.store')}}" method="post">
        @csrf

        {{-- @include('tasks._form', [
            'task' => new App\Models\Task,  
        ]) --}}
        @include('tasks._form')

    </form>
</div>

</div>
