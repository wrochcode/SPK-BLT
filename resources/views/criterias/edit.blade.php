<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Kriteria</h1>

                <div style="margin-bottom: 15px">

                    <h1> Update New Criteria</h1>
                    {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                    <form action="{{route('criterias.update', $criteria->id)}}" method="post">
                        @csrf
                        @method('put')
                        
                        {{-- @include('tasks._form') --}}
                        <div class="mb-2">
                                <div class="mb-2">
                                    <h5> Kriteria</h5>
                                    <input type="text" name="kriteria" class="form-control " value="{{$criteria->kriteria}}" placeholder="the name of the kriteria">
                                </div>
                                <div class="mb-2">

                                    <h5> Bobot kriteria</h5>
                                    <input type="text" name="bobot_kriteria" class="form-control" value="{{$criteria->bobot_kriteria}}" placeholder="the name of the bobot">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">{{$submit}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
