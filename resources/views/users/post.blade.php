<x-app-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">{{ $user->name }}</div>
          <div class="card-body">

            <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>descrpition</th>
                </tr>
              </thead>
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  {{-- <td>{{$user->countryName}}</td> --}}
                  <td>{{ $post->body ?? 'No category' }}</td>
                  {{-- {{dd($user)}} --}}

                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
