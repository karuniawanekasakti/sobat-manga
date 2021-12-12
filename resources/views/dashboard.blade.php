@extends('layout.home')
@section('content')
<main>
    <div class="container-fluid px-4 ">
        <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-bookmark"></i> Jumlah Manga
                        <p class="card-text fs-1">{{$jumlah_buku}}</p>
                    </div>
                    
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/buku">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><i class="fas fa-users"></i> Saudara Wibu
                        <p class="card-text fs-1">{{$jumlah_user}}</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/data-user">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><i class="fas fa-thumbs-up"></i> Favorit
                        <p class="card-text fs-1">{{$suka}}</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/baca-buku">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><i class="fas fa-comments"></i> Comments
                        <p class="card-text fs-1">{{$jumlah_comment}}</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/baca-buku">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection