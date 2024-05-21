@extends('dashboard.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User table</h1>
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
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Create User</a>
                        <a href="{{ route('admin.assets') }}?export=pdf" class="btn btn-danger mb-3">Export PDF</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Karyawan</h3>
                                <div class="card-tools">
                                    <form action="{{ route('admin.user') }}" method="get">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Search" value="{{ $request->get('search') }}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile Image</th>
                                            <th>Name</th>
                                            <th>NIK</th>
                                            <th>Email</th>
                                            <th>Assets</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="#"><img src="{{ asset('storage/profil-image-user/' . $d->image) }}"
                                                    width="100" height="100"></a></td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->ktp->nik ?? '' }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($d->assets as $asset)
                                                            <li>{{ $asset->assets_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
