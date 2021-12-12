@extends('layout.home')
@section('content')
    <div class="container mt-3">
        <h1 class="mt-4">Data User</h1>
        <table class="table ml-auto mt-3 table-bordered table-striped">
            <thead>
                <tr>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Level User</th>
                    <th></th>
                </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_user as $user)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->created_at}}</td>
                    <td>{{$user->is_admin}}</td>
                    <td>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning" method="POST"><i class="fas fa-edit"></i></a>
                        <a href="{{route('user.konfirmasi',$user->id)}}" class="btn btn-danger" method="POST"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach

    
            </tbody>
        </table>
    </div>
@endsection