@extends('dashboard.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">detail User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.update', ['id' => $data->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="row card-body">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <p>{{ $data->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <p>{{ $data->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Profil Images</label><br>
                                            <img src="{{ asset('storage/profil-image-user/' . $data->image) }}"
                                                alt="" width="100" height="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe Rumah</th>
                                                <th>Harga Rumah</th>
                                                <th>Lokasi Rumah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->rumahs as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$i->type_rumah}}</td>
                                                <td>{{$i->harga_rumah}}</td>
                                                <td>{{$i->lokasi_rumah}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
