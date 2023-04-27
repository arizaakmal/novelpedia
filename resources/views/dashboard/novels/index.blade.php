@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Novels</h1>
    </div>
    {{-- tambahkan button untuk menambahkan novel dengan icon data-feather --}}
    <a href="/dashboard/novels/create" class="btn btn-primary mb-3">
        <span data-feather="plus"></span> Create new novel
    </a>


    {{-- <a href="/dashboard/novels/create" class="btn btn-primary mb-3">Create new novel</a> --}}

    {{-- tambahkan flash message ketika novel berhasil ditambahkan --}}
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- tambahkan flash message ketika novel berhasil dihapus --}}
    @if (session()->has('delete'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    {{-- tambahkan flash message ketika novel berhasil diupdate --}}
    @if (session()->has('update'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('update') }}
        </div>
    @endif


    <table class="table table-responsive col-lg-8">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- loop kode tr dibawah  --}}

            @foreach ($novels as $novel)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $novel->title }}</td>
                    <td>{{ $novel->author->name }}</td>
                    <td>{{ $novel->genre }}</td>
                    <td> <a href="#" class="btn btn-sm btn-primary mr-2">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="#" class="btn btn-sm btn-warning mr-2">
                            <span data-feather="edit"></span>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
