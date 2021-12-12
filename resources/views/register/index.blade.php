@extends('layout.sign')
@section('content')
<div class="container">
    <main class="form-signin">
        <form action="/register" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-bold text-center">Register Here!</h1>
            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" value="{{old('name')}}">
                <label for="floatingInput">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{old('email')}}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register Now!</button>
        </form>
        <small class="d-block text-center mt-3">Sudah punya akun? Temukan Manga Favoritmu <a href="/login">Disini!</a></small>
    </main>
</div>
@endsection