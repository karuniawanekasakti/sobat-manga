@extends('layout.home')
@section('content')
<div class="row mt-3 p-3 m-auto">
    <h1 class="mt-4">List Manga</h1>
    <div class="mb-4">
        <form action="{{route('baca.search')}}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="kata">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
        </form>
    </div>
    @foreach ($data_buku as $buku)
    <div class="card text-center mt-3" style="width: 18rem;margin-left:20px;padding:10px;">
        <a href="{{ asset('thumb/' . $buku->foto) }}" data-lightbox="image-1" data-title="{{$buku->judul}}">
            <img src="{{ asset('thumb/' . $buku->foto) }}"  class="card-img-top" alt="..." style="height:200px;width:150px;display:block;margin-left:auto;margin-right:auto;">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{$buku->judul}}</h5>
            <p class="card-text">{{$buku->deskripsi}}</p>
            <a href="{{$buku->link}}" class="btn btn-primary"><i class="fas fa-book-open"></i> Baca</a>
            <a href="{{route('buku.info',$buku->id)}}" class="btn btn-success" method="post"><i class="fas fa-info-circle"></i> Info</a>
        </div>
        <div class="card-footer text-muted m-">
            Diupdate {{$buku->updated_at}}
        </div>
    </div>
    @endforeach

</div>
@endsection
