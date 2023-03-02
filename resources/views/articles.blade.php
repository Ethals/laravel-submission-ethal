@extends('layouts_beranda.app')

@section('content')
     <div class="container marketing">
          <div class="row">
               <!-- @foreach ($articles as $article)
               <div class="col-lg-4">
                    @if($article->image)
                         <img class="bd-placeholder-img rounded-circle" src="{{ asset('uploads/' . $article->image) }}" width="140" height="140">
                    @else
                         <img class="bd-placeholder-img rounded-circle" src="https://source.unsplash.com/240x240?{{ $article->category->name }}" alt="">
                    @endif
                    <h2 class="fw-normal">{{ $article->title }}</h2>
                    <small>{{ $article->category->name }}</small>-<small>{{ $article->created_at->format('d F Y') }}</small>
                    <p>{{ $article->desc }}</p>
                    @foreach ($article->tags as $tag)
                         <span class="mr-3 text-sm font-medium uppercase">#{{ $tag->name }}</span>
                    @endforeach
                    <p><a class="btn btn-secondary" href="{{ route('show', $article) }}">View details &raquo;</a></p>
               </div>
               @endforeach -->

               @foreach ($articles as $article)
               <div class="col-lg-4 col-md-6 wow slideInUp mt-4"  data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded overflow-hidden" style="box-shadow: -3px 5px 15px rgba(0, 0, 0, .4);">
                         <div class="blog-img position-relative overflow-hidden">
                              @if($article->image)
                                   <!-- <div class="responsive-kabar img-fluid img-kabar" style="background-image: url({{ asset('uploads/' . $article->image) }});"></div> -->
                                   <img class="bd-placeholder-img" src="{{ asset('uploads/' . $article->image) }}" width="140" height="140">
                              @else
                                   <!-- <div class="responsive-kabar img-fluid img-kabar" style="background-image: url(https://source.unsplash.com/240x240?{{ $article->category->name }});"></div> -->
                                   <img class="bd-placeholder-img w-100" src="https://source.unsplash.com/240x200?{{ $article->category->name }}" alt="">
                              @endif
                         </div>
                         <div class="px-4 py-2">
                              <div class="d-flex mb-3">
                                   <small class="me-3"><i class="far fa-user text-green1 me-2"></i>{{ $article->user->name }}</small>
                                   <small class="me-3"><i class="far fa-calendar-alt text-green1 me-2"></i>{{ $article->created_at->format('d F Y') }}</small>
                              </div>
                              <h5 class="mb-3">{{ $article->title }}</h5>
                              <div class="text-justify mb-3">{!! nl2br($article->desc) !!}</div>
                              @foreach ($article->tags as $tag)
                                   <small><i class="fas fa-hashtag me-1"></i>{{ $tag->name }}</small>
                              @endforeach
                              <small class="ms-3"><i class="fas fa-tags text-green1 me-1"></i>{{ $article->category->name }}</small>
                              <!-- <a class="text-uppercase text-green1" style="font-size: small;" href="{{ route('show', $article) }}">Baca Lengkap<i class="bi bi-arrow-right"></i></a> -->
                              <p><a class="btn btn-secondary" href="{{ route('show', $article) }}">View details &raquo;</a></p>
                         </div>
                    </div>                             
               </div>
               @endforeach

          </div>
     </div>
@endsection

