@extends('layout.home')
@section('content')
<div class="container mt-3">
    <h1 class="mt-4"><i class="fas fa-book-open"></i> Daftar Manga</h1>

    {{-- <div class="row justify-content-end mb-1">
        <div class="col-md-6">
            <form action="{{route('buku.search')}}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="kata">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
            </form>
        </div>
    </div> --}}

    <table class="table ml-auto mt-3 table-bordered table-striped">
        <div class="row justify-content-end">
            <div class="col-md-6 mb-1">
                <form action="{{route('buku.search')}}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="kata">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i> Search</button>
                </div>
                </form>
            </div>
        </div>
    <a class="btn btn-primary justify-content-start" href="{{route('buku.create')}}"><i class="fas fa-plus"></i> Tambah Buku</a>
        <thead>
            <tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Cover</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Terbit</th>
                <th scope="col"></th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>
                    <img src="{{ asset('thumb/' . $buku->foto) }}" style="height:200px;width:150px;"/>
                </td>
                <td>{{ $buku->judul}}</td>
                <td>{{ $buku->penulis}}</td>
                <td>{{ $buku->deskripsi }}</td>
                <td>{{$buku->tgl_terbit->format('d/m/y')}}</td>
                <td>
                        <a href="{{route('buku.edit',$buku->id)}}" class="btn btn-warning" method="post"><i class="fas fa-edit"></i></a>
                        <a href="{{route('buku.konfirmasi',$buku->id)}}" class="btn btn-danger" method="post" ><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach

            <script>
                @if(Session::has('pesan'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('pesan') }}");
                @endif

                @if(Session::has('pesan-delete'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('pesan-delete') }}");
                @endif

            </script>

        </tbody>
    </table>

    <div class="pagination justify-content-end">{{$data_buku->links()}}</div>
</div>

@endsection
