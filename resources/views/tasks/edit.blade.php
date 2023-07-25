<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Tasks</h1>

                <div style="margin-bottom: 15px">

                    <h1> Update New Tasks</h1>
                    {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                    <form action="{{route('tasks.update', $task->id)}}" method="post">
                        @csrf
                        @method('put')
                        
                        @include('tasks._form')

                    </form>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
