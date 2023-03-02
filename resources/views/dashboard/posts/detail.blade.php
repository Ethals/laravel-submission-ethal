@extends('dashboard.layout.layout')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3"> {{ $post->title }} </h2>

            <a href="/dashboard/posts" class="btn btn-info btn-sm"> <span data-feather="arrow-left"></span> Back to All My Posts</a>
            <a href="/dashboard/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm"> <span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete this post?')"><span data-feather="trash"></span> Delete</button>
            </form>
            
            @if ($post->image)
                <div style="max-height: 240px ; overflow:hidden" class="">
                    <img src="{{ asset('public/uploads/' . $post->image) }}" alt="" class="img-fluid mx-auto d-block mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/480x240?{{ $post->category->name }}" class="img-fluid mx-auto d-block mt-3" alt="{{ $post->category->name }}">
            @endif
            
            <article class="my-3 fs-5 mx-auto">
                {{-- Agar Script HTML dapat dieksekusi --}}
                {!! $post->post !!}
                
                {{-- Script HTML ditampilkan jadi String --}}
                {{-- {{ $post->post}} --}}
            </article>
        </div>
    </div>
 </div>
@endsection