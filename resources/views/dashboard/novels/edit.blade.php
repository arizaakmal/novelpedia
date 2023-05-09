@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Novel</h1>
    </div>

    {{-- Buat form untuk create novel --}}
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/novels" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                {{-- tambahkan old('title') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    autofocus value="{{ old('title', $novel->title) }}">
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
                    value="{{ old('slug', $novel->slug) }}">
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
                <div class="row">
                    @foreach ($genres as $genre)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                    id="{{ $genre->name }}"
                                    {{ is_array(old('genres')) && in_array($genre->id, old('genres', $novelGenres->name)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $genre->name }}">
                                    {{ $genre->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- tambahkan error message untuk genre --}}
                @error('genres')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- tambahkan old('author') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <select class="form-select @error('author_id') is-invalid @enderror" name="author_id">
                    @foreach ($authors as $author)
                        @if (old('author_id', $novel->author_id) == $author->id)
                            <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                        @else
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
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
                <input type="hidden" name="oldCover" value="{{ $novel->cover }}">
                @if ($novel->cover)
                    <img src="{{ asset('storage/covers/' . $novel->cover) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @endif
                <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover"
                    name="cover" accept="image/*" onchange="previewImage()">
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
                    rows="5">{{ old('description', $novel->description) }}</textarea>
                {{-- tambahkan error message untuk description --}}
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- tambahkan old('status') untuk menampilkan kembali inputan sebelumnya ketika terjadi error --}}
            {{-- <div class="mb-3">
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

    <button type="submit" class="btn btn-primary">Edit!</button>
    </form>
    </div>

    <script>
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.querySelector('input[name="slug"]');

        titleInput.addEventListener('input', (e) => {
            const slug = e.target.value.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
            slugInput.value = slug;
        });

        function previewImage() {

            const image = document.querySelector('#cover');
            const imgPreview = document.querySelector('.img-preview');

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
