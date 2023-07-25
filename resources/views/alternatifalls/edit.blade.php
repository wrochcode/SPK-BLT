<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Alternatif All</h1>

                <div style="margin-bottom: 15px">

                    <h1> Update New Alternatif</h1>
                    {{-- <form action="/tasks/{{$task->id}}" method="post"> --}}
                    <form action="{{route('alternatifalls.update', $alternatifall->id)}}" method="post">
                        @csrf
                        @method('put')

                        {{-- @include('tasks._form') --}}
                        <div class="mb-2">
                            <div class="mb-2">
                                <h5> Kriteria_id</h5>
                                <input type="text" name="id_kriteria" class="form-control " value="{{$alternatifall->id_kriteria}}" placeholder="the name of the kriteria">
                            </div>
                            <div class="mb-2">
                                <h5> SubKriteria_id</h5>
                                <input type="text" name="id_subkriteria" class="form-control " value="{{$alternatifall->id_subkriteria}}" placeholder="the name of the subkriteria">
                            </div>
                            <div class="mb-2">

                                <h5> Nama warga</h5>
                                <input type="text" name="name_warga" class="form-control" value="{{$alternatifall->name_warga}}" placeholder="the name of the nilai skala">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">{{$submit}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
