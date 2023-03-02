@extends('dashboard.layout.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit tag</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/dashboard/tags/{{ $tag->id }}" method="POST" class="mb-5">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">tag Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        required autofocus value="{{ old('name', $tag->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
                        required value="{{ old('slug') }}">
                    <div id="slugHelp" class="form-text">
                        Tekan <code class="bg-dark text-white px-2 py-1 rounded">Tab</code> atau <code
                            class="bg-dark text-white px-2 py-1 rounded">Enter</code>
                        pada
                        keyboard agar melakukan generate
                        slug secara otomatis.
                    </div>

                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->

                <button type="submit" class="btn btn-primary">Create tag</button>
            </form>
        </div>
    </div>





    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/tags/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('tirx-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

@endsection
