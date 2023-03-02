@extends('layouts_beranda.app')

@section('content')
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-12">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">
                        {{ $post->title }}
                    </h2>
                    @if($post->image)
                        <img class="bd-placeholder-img rounded-circle" src="{{ asset('uploads/' . $post->image) }}" width="140" height="140">
                    @else
                        <img class="bd-placeholder-img rounded-circle" src="" alt="">
                    @endif
                    <h2 class="fw-normal">{{ $post->title }}</h2>
                    <small>{{ $post->category->name }}</small>-<small>{{ $post->created_at->format('d F Y') }}</small>
                    <p>{!! nl2br($post->post) !!}</p>
                    @foreach ($post->tags as $tag)
                        <span
                            class="mr-3 text-sm font-medium uppercase">#{{ $tag->name }}</span>
                    @endforeach
            </div>
        </div>
    </div>
@endsection