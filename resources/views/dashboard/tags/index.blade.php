@extends('dashboard.layout.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Tags</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/tags/create" class="btn btn-primary mb-3">Add new tag</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" width="5%">No</th>
                    <th scope="col" width="25%">tag Name</th>
                    <th scope="col" class="text-center" width="30%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/tags/{{ $tag->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>

                            <form action="/dashboard/tags/{{ $tag->id }}" method="POST"
                                class="d-inline">
                                @csrf

                                @method('delete')

                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="trash"></span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
