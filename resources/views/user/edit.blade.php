@extends('layout.home')
@section('content')
<div class="container mt-3">
    <h4>Edit Data User</h4>
    @foreach($data_user as $user)
    <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Level User</label>
            <input type="text" name='is_admin' class="form-control @error('is_admin') is-invalid @enderror" value="{{$user->is_admin}}">
            <p class="fs-6">*Masukan input 1 = admin 0=user biasa</p>
            @error('is_admin')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input type="text" name='email' class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>


        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/data-user" class="btn btn-danger">Batal</a>
        </div>
    </form>
    @endforeach
</div>
@endsection