@extends('layouts.main')
@section('container')
<a href="{{ route('admin.user')}}" class="btn btn-primary">dashboard</a>
<a href="{{ route('login')}}" class="btn btn-success">Login</a>
@endsection
