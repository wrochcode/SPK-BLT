<div class="card">
  <div class="card-header">Create New Criterias</div>
  <div class="card-body">

    {{-- menampilkan alert error --}}
    {{-- @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
    @endforeach --}}

    {{-- @if ($errors->all())
    <div class="alert alert-danger">Your data was invalid</div>
    @endif --}}

    {{-- <form action="/tasks" method="post" class="d-flex"> --}}
    <form action="{{ route('criterias.store') }}" method="post">
      @csrf
      @include('criterias._form')

    </form>
  </div>

</div>
