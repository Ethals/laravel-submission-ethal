@extends('dashboard.layout.layout')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3"> {{ $article->title }} </h2>

            <a href="/dashboard/articles" class="btn btn-info btn-sm"> <span data-feather="arrow-left"></span> Back to All My articles</a>
            <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn btn-warning btn-sm"> <span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/articles/{{ $article->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete this article?')"><span data-feather="trash"></span> Delete</button>
            </form>
            
            @if ($article->image)
                <div style="max-height: 240px ; overflow:hidden" class="">
                    <img src="{{ asset('public/uploads/' . $article->image) }}" alt="" class="img-fluid mx-auto d-block mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/480x240?{{ $article->category->name }}" class="img-fluid mx-auto d-block mt-3" alt="{{ $article->category->name }}">
            @endif
            
            <article class="my-3 fs-5 mx-auto">
                {{-- Agar Script HTML dapat dieksekusi --}}
                {!! $article->desc !!}
                
                {{-- Script HTML ditampilkan jadi String --}}
                {{-- {{ $article->desc}} --}}
            </article>
        </div>
    </div>
 </div>
@endsection