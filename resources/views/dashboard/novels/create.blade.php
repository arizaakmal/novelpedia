@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Novel</h1>
    </div>

    {{-- Buat form untuk create novel --}}
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/novels">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                {{-- tambahkan old('title') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    autofocus value="{{ old('title') }}">
                {{-- tambahkan error message untuk title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('slug') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}">
                {{-- tambahkan error message untuk slug --}}
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('genre') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre"
                    name="genre" value="{{ old('genre') }}">
                {{-- tambahkan error message untuk genre --}}
                @error('genre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('author') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <select class="form-select" name="author_id">
                    @foreach ($novels as $novel)
                        @if (old('author_id') == $novel->author->id)
                            <option value="{{ $novel->author->id }}" selected>{{ $novel->author->name }}
                            </option>
                        @else
                            <option value="{{ $novel->author->id }}">{{ $novel->author->name }}</option>
                        @endif
                    @endforeach
                </select>
                {{-- tambahkan error message untuk author --}}
                @error('author_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('cover') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="text" class="form-control @error('cover') is-invalid @enderror" id="cover"
                    name="cover" value="{{ old('cover') }}">
                {{-- tambahkan error message untuk cover --}}
                @error('cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- tambahkan old('description') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="5">{{ old('description') }}</textarea>
                {{-- tambahkan error message untuk description --}}
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('status') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="ONGOING" {{ old('status') == 'ONGOING' ? 'selected' : '' }}>ONGOING</option>
                    <option value="COMPLETED" {{ old('status') == 'COMPLETED' ? 'selected' : '' }}>COMPLETED</option>
                </select>
                {{-- tambahkan error message untuk status --}}
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create!</button>
        </form>
    </div>
@endsection
