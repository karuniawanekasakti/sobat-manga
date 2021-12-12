{{-- <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body> --}}
@extends('layout.home')
@section('content')
<div class="container mt-3">
    <h4>Edit Data Buku</h4>
    @foreach($data_buku as $buku)
    <form action="{{route('buku.update',$buku->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Judul</label>
            <input type="text" name='judul' class="form-control @error('judul') is-invalid @enderror" value="{{$buku->judul}}">
            @error('judul')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Penulis</label>
            <input type="text" name='penulis' class="form-control @error('penulis') is-invalid @enderror" value="{{$buku->penulis}}">
            @error('penulis')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Deskripsi</label>
            <input type="textarea" name='deskripsi' class="form-control  @error('deskripsi') is-invalid @enderror" value="{{$buku->deskripsi}}" style="height: 100px">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label is-invalid">Link Manga</label>
            <input type="text" name='link' class="form-control  @error('link') is-invalid @enderror" value="{{$buku->link}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tanggal Terbit</label>
            <input type="date" id='tgl_terbit' name='tgl_terbit' class="date form-control @error('tgl_terbit') is-invalid @enderror" placeholder='yyyy/mm/dd' value="{{$buku->tgl_terbit}}">
            @error('tgl_terbit')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Masukan Cover Manga</label>
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="{{$buku->foto}}">
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
    @endforeach
</div>
@endsection
    

    {{-- <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html> --}}
