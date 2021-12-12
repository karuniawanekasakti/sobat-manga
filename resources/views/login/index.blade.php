@extends('layout.sign')
@section('content')
<div class="container">
    <main class="form-signin">
        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-bold text-center">Sign In Here!</h1>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus value="{{old('email')}}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
                
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center mt-3">Belum punya akun? Daftar <a href="/register">Disini!</a></small>
    </main>
</div>
@endsection



