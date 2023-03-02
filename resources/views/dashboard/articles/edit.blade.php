@extends('dashboard.layout.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom d-inline">
    <h2>Edit Articles</h2>
</div>

<div class="col-lg-6">
     <form method="POST" action="/dashboard/articles/{{ $article->id }}" class="mb-5" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="title" class="form-label @error('title') is-invalid @enderror"> Title </label>
            {{-- menampilkan isian sebelumnya, kalau tidak ada pakai $article->(indeks) --}}
            <input type="text" class="form-control" id="title" name="title" required autofocus value="{{ old('title', $article->title) }}">
               @error('title') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div>
          <!-- <div class="mb-3">
            <label for="slug" class="form-label @error('slug') is-invalid @enderror"> Slug </label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug', $article->slug) }}">
               @error('slug') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div> -->
          <div class="mb-3">
               <label for="category" class="form-label"> Category </label>
               <select name="category" id="category" class="block w-full mt-1">
                    <option value="#">--- SELECT CATEGORY ---</option>
                    @foreach ($categories as $category)
                         <option value="{{ $category->id }}"
                              @if (in_array($category->id, $article->category->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                    @endforeach
               </select>
               @error('category')
               <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
               @enderror
          </div>
          <div class="mb-4">
               <label for="tags" class="form-label">Tags</label>
               <input id="tags" class="form-control" name="tags" type="text" value="{{ old('tags') }}"/>
               <span class="text-xs text-gray-400">Separated by comma</span>
               @error('tags')
               <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
               @enderror
          </div>
          <div class="mb-3">
               <label for="image" class="form-label @error('image') is-invalid @enderror">Thumbnail </label>
               @if ($article->image)
                    <img src="{{ asset('storage/'. $article->image) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block">
               @else
               
               @endif
               <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
               @error('image') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div>
          <div class="mb-3">
               <label for="desc" class="form-label"> desc </label>
               @error('desc') <p class="text-danger">{{ $message }}</p> @enderror
               <input id="desc" type="hidden" name="desc" value="{{ old('desc', $article->desc)}}"> 
               <trix-editor input="desc"></trix-editor>

          </div>
          
          <button type="submit" class="btn btn-primary">Update article</button>
     </form>
</div>

<script>
     // Untuk men-slug kan title
     const title = document.querySelector('#title');
     const slug = document.querySelector('#slug');

     title.addEventListener('change', function(){
          fetch('/dashboard/articles/checkSlug?title=' + title.value)
               .then(response=>response.json())
               .then(data=>slug.value = data.slug)
     });

     // Mencegah upload file pada trix-editor
     document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
     });

     // =============================================
     // Preview Image
     function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
               imgPreview.src=oFREvent.target.result;
          }
     }
</script>

@endsection