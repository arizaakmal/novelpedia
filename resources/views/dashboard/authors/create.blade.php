@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Author</h1>
    </div>

    {{-- Buat form untuk create novel --}}
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/authors" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                {{-- tambahkan old('name') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    autofocus value="{{ old('name') }}">
                {{-- tambahkan error message untuk name --}}
                @error('name')
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
    </div>

    <button type="submit" class="btn btn-primary">Create!</button>
    </form>
    </div>
    <script>
        const titleInput = document.querySelector('input[name="name"]');
        const slugInput = document.querySelector('input[name="slug"]');

        titleInput.addEventListener('input', (e) => {
            const slug = e.target.value.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
            slugInput.value = slug;
        });
    </script>
@endsection
