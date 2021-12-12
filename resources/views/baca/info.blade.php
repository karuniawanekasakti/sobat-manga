@extends('layout.home')
@section('content')
<div class="container mt-3">
    @foreach ($data_buku as $buku)
    <div class="card text-center" style="width: 500px;height: 500px;margin: auto">
        <div class="card-header fw-bold">
            {{$buku->judul}}
        </div>
        <a href="{{ asset('thumb/' . $buku->foto) }}" data-lightbox="image-1" data-title="{{$buku->judul}}">
        <img src="{{ asset('thumb/' . $buku->foto) }}" class="card-img" alt="{{$buku->buku_seo}}">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{$buku->title}}</h5>
            <a href="{{$buku->link}}" class="btn btn-primary"><i class="fab fa-readme"></i> Baca</a>
            <a href="{{route('like.manga',$buku->id)}}" class="btn btn-danger">
                <i class="fas fa-heart"></i> Favorit
                <span class="badge">{{$buku->suka}}</span>
            </a>
        </div>
    </div>

    <div class="container mt-3">
        <div class="card text-center">
            <div class="card-header fw-bold">
              Sinopsis
            </div>
            <div class="card-body">
                {{$buku->deskripsi}}
            </div>
          </div>
    </div>
    

    <div class="container mt-5">
        <h4>Comment</h4>
        <div class="card-comment">
            <form action="{{route('comment.store')}}" method="POST">
                @csrf
                <div class="form-floating mb-5">
                    <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"></textarea>
                    <label for="floatingTextarea">Comments</label>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
            @foreach ($data_comment as $comments)
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media"> 
                                <img  class="mr-3 rounded-circle" src="{{ asset('img/pngwing.png') }}" alt="">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-8 d-flex">
                                            <h5>{{$comments->user}}</h5>
                                        </div>
                                        <div class="col-4">
                                            <div class="pull-right reply"> <a href="#"><span><i class="fa fa-reply"></i> reply</span></a> </div>
                                        </div>
                                    </div> 
                                    {{$comments->comment}} 
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    @endforeach
</div>
@endsection
