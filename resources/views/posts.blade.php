@extends('layouts_beranda.app')

@section('content')
     <div class="container marketing">
          <div class="row">
               <!-- @foreach ($posts as $post)
               <div class="col-lg-4">
                    @if($post->image)
                         <img class="bd-placeholder-img rounded-circle" src="{{ asset('uploads/' . $post->image) }}" width="140" height="140">
                    @else
                         <img class="bd-placeholder-img rounded-circle" src="https://source.unsplash.com/240x240?{{ $post->category->name }}" alt="">
                    @endif
                    <h2 class="fw-normal">{{ $post->title }}</h2>
                    <small>{{ $post->category->name }}</small>-<small>{{ $post->created_at->format('d F Y') }}</small>
                    <p>{{ $post->post }}</p>
                    @foreach ($post->tags as $tag)
                         <span class="mr-3 text-sm font-medium uppercase">#{{ $tag->name }}</span>
                    @endforeach
                    <p><a class="btn btn-secondary" href="{{ route('show', $post) }}">View details &raquo;</a></p>
               </div>
               @endforeach -->

               @foreach ($posts as $post)
               <div class="col-lg-4 col-md-6 wow slideInUp mt-4"  data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded overflow-hidden" style="box-shadow: -3px 5px 15px rgba(0, 0, 0, .4);">
                         <div class="blog-img position-relative overflow-hidden">
                              @if($post->image)
                                   <!-- <div class="responsive-kabar img-fluid img-kabar" style="background-image: url({{ asset('uploads/' . $post->image) }});"></div> -->
                                   <img class="bd-placeholder-img" src="{{ asset('uploads/' . $post->image) }}" width="140" height="140">
                              @else
                                   <!-- <div class="responsive-kabar img-fluid img-kabar" style="background-image: url(https://source.unsplash.com/240x240?{{ $post->category->name }});"></div> -->
                                   <img class="bd-placeholder-img w-100" src="https://source.unsplash.com/240x200?{{ $post->category->name }}" alt="">
                              @endif
                         </div>
                         <div class="px-4 py-2">
                              <div class="d-flex mb-3">
                                   <small class="me-3"><i class="far fa-user text-green1 me-2"></i>Admin</small>
                                   <small class="me-3"><i class="far fa-calendar-alt text-green1 me-2"></i>{{ $post->created_at->format('d F Y') }}</small>
                              </div>
                              <h5 class="mb-3">{{ $post->title }}</h5>
                              <div class="text-justify mb-3">{!! nl2br($post->post) !!}</div>
                              @foreach ($post->tags as $tag)
                                   <small><i class="fas fa-hashtag me-1"></i>{{ $tag->name }}</small>
                              @endforeach
                              <small class="ms-3"><i class="fas fa-tags text-green1 me-1"></i>{{ $post->category->name }}</small>
                              <!-- <a class="text-uppercase text-green1" style="font-size: small;" href="{{ route('show', $post) }}">Baca Lengkap<i class="bi bi-arrow-right"></i></a> -->
                              <p><a class="btn btn-secondary" href="{{ route('show', $post) }}">View details &raquo;</a></p>
                         </div>
                    </div>                             
               </div>
               @endforeach

          </div>
     </div>
@endsection

