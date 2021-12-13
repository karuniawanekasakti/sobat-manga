@extends('layout.home')
@section('content')
    <div class="container mt-3">
        <h3><strong><i class="fas fa-plus"></i> Tambah Buku</strong></h3>
        <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Judul</label>
            <input type="text" name='judul' class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}">
            @error('judul')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Penulis</label>
            <input type="text" name='penulis' class="form-control  @error('penulis') is-invalid @enderror" value="{{old('penulis')}}">
            @error('penulis')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Deskripsi</label>
            <input type="textarea" name='deskripsi' class="form-control  @error('deskripsi') is-invalid @enderror" value="{{old('harga')}}" style="height: 100px">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Link Manga</label>
            <input type="text" name='link' class="form-control  @error('link') is-invalid @enderror" value="{{old('link')}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Tanggal Terbit</label>
            <input type="date" id='tgl_terbit' name='tgl_terbit' class="date form-control  @error('tgl_terbit') is-invalid @enderror" placeholder="yyyy/mm/dd" value="{{old('tgl_terbit')}}">
            @error('tgl_terbit')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Masukan Cover Manga</label>
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
            @error('foto')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/buku" class="btn btn-danger">Batal</a>

        </form>
    </div>
@endsection