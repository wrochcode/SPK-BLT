<!DOCTYPE html>
<html lang="en">
<x-app-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header">Create New Task</div>
          <div class="card-body">

            {{-- <form action="/tasks" method="post" class="d-flex"> --}}
            <form action="{{ route('alternatifalls.store') }}" method="post">
              @csrf
              <div class="mb-2">
                {{-- new: --}}

                <div class="mb-2">
                  <div class="form-group ">
                    @for ($x = 0; $x < count($title); $x++)
                      <h5>{{ $title[$x] }}</h5>
                      <select class="form-control form-control-lg mb-3" id="position-option "
                        name="{{ $title[$x] }}">
                        {{-- <option selected>Open this select menu</option> --}}
                        @for ($y = 0; $y < $total_sub[$x]; $y++)
                          <option value="{{ $final_alternatif[$x][$y]['id'] }}">{{ $final_alternatif[$x][$y]['nama'] }}
                          </option>
                        @endfor
                      </select>
                    @endfor
                  </div>
                </div>
                <div class="mb-2">
                  <div class="form-group ">
                    <h5>Nama Warga</h5>
                    <input type="text" name="name_warga" class="form-control"
                      placeholder="the name of the name warga">

                  </div>
                </div>
                {{-- end new --}}

                {{-- end form --}}
                <div class="mb-2">
                  <button class="btn btn-primary" type="submit">{{ $submit }}</button>
                </div>
            </form>
          </div>

        </div>

        {{-- Show Alternatif All --}}
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
                      @foreach ($criterias as $criteria)
                        <th>{{ $criteria->kriteria }}</th>
                      @endforeach
                      {{-- <th>Bobot</th> --}}
                    </tr>
                  </thead>
                  @php
                    $hitung = 1;
                  @endphp
                  @foreach ($alter as $alt => $a)
                    <tr>
                      <td>{{ $hitung++ }}</td>
                      <td>{{ $a['name_warga'] }}</td>
                      <td>{{ $a['Pekerjaan'] }}</td>
                      <td>{{ $a['Penghasilan'] }}</td>
                      <td>{{ $a['Kepemilikan Rumah'] }}</td>
                      <td>{{ $a['Tanggungan'] }}</td>
                      <td>{{ $a['Domisili'] }}</td>
                      {{-- <td>{{ $finalvektor[$hitung-2] }}</td> --}}
                      <td>
                        <form action="{{ route('alternatifalls.destroy', $a['name_warga']) }}" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </li>
            </ul>
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
                      <th>Bobot</th>
                    </tr>
                  </thead>
                  @php
                    $hitung = 1;
                  @endphp
                  @foreach ($alter as $alt => $a)
                    <tr>
                      <td>{{ $hitung++ }}</td>
                      <td>{{ $finalvektor[$hitung - 2] }}</td>
                    </tr>
                  @endforeach
                  <tr>
                    <td>Max : {{ $max }}</td>
                    <td>Min : {{ $min }}</td>
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
                    $hitung = 1;
                  @endphp
                  @foreach ($alter as $alt => $a)
                    <tr>
                      <td>{{ $hitung++ }}</td>
                      <td>{{ $finalvektor[$hitung - 2] }}</td>
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
