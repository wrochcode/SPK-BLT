<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Sub Kriteria</h1>

                <div style="margin-bottom: 15px">

                    <h1> Update New SubCriteria</h1>
                    {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                    <form action="{{route('subcriterias.update', $subcriteria->id)}}" method="post">
                        @csrf
                        @method('put')

                        {{-- @include('tasks._form') --}}
                        <div class="mb-2">
                            <div class="mb-2">
                                <h5> Kriteria</h5>
                                <input type="text" name="kriteria_id" class="form-control " value="{{$subcriteria->kriteria_id}}" placeholder="the name of the kriteria">
                            </div>
                            <div class="mb-2">
                                <h5> SubKriteria</h5>
                                <input type="text" name="sub_kriteria" class="form-control " value="{{$subcriteria->sub_kriteria}}" placeholder="the name of the subkriteria">
                            </div>
                            <div class="mb-2">

                                <h5> Nilai Skala</h5>
                                <input type="text" name="nilai_skala" class="form-control" value="{{$subcriteria->nilai_skala}}" placeholder="the name of the nilai skala">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">{{$submit}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
