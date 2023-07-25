<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Welcome to my site</div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur officia accusantium repellat tempore? Nobis dolorum ducimus non sapiente velit, sequi excepturi molestiae officiis enim culpa maxime eaque pariatur soluta ad?</p>
                        <p>Libero, consequatur. Ipsum quidem perspiciatis, ducimus id numquam ut blanditiis sunt in, mollitia officia et vitae sit corrupti, reprehenderit itaque commodi aut similique? Nostrum dolore eveniet reprehenderit. Adipisci, laboriosam eum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
