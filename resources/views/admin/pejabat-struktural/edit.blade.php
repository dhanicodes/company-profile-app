@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Tambah Pejabat</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/pejabat-struktural/{{ $pejabat->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        required value="{{ old('name', $pejabat->name) }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="position" class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position"
                        required value="{{ old('position', $pejabat->position) }}">
                    @error('position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label">Nomor</label>
                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number"
                        required value="{{ old('number', $pejabat->number) }}">
                    @error('number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $pejabat->image }}">
                    @if ($pejabat->image)
                        <img src="{{ asset('storage/' . $pejabat->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                        <input class="form-control" type="file" id="image" name="image" @error('image') is-invalid @enderror
                            onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
                <button type="submit" class="btn btn-primary mb-4">Buat</button>

            </form>
        </div>
    </div>
</div>

<script>

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
