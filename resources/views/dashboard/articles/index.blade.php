@extends('dashboard.layout.layout')

@section('content')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">My articles</h1>
     </div>

     @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show col-lg-10 mx-auto" role="alert">
               {{ session ('success') }}
          </div>
     @endif

     <a href="/dashboard/articles/create" class="btn btn-info btn-sm my-2"> Create New article </a>
     <div class="table-responsive col-lg-10 mx-auto">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th> 
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($articles as $article)
               <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                         <a href="/dashboard/articles/{{ $article->id }}" class="badge bg-secondary"><span data-feather="eye"></span> </a>
                         {{-- /edit adalah aturan default dari route --}}
                         <a href="/dashboard/articles/{{ $article->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                         <form action="/dashboard/articles/{{ $article->id }}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this article?')"><span data-feather="trash"></span></button>
                         </form>
                    </td>
               </tr>
               @endforeach
            </tbody>
          </table>
     </div>
@endsection
