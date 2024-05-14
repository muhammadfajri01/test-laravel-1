@extends('layouts.main')
@section('container')
<a href="{{ route('admin.user')}}" class="btn btn-primary">dashboard</a>
<a href="{{ route('login')}}" class="btn btn-success">Login</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
