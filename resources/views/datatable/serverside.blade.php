@extends('dashboard.layout.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection
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
                            <li class="breadcrumb-item active">User (ClientSide)</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="serverside">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
@section('script')
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
        loadData();
    } );

    function loadData(){
        $('#serverside').DataTable({
            processing:true,
            pagination:true,
            responsive:false,
            serverSide:true,
            searching:true,
            ordering:false,
            ajax:{
                url:'{{ route('admin.serverside')}}',
            },
            columns:[
                {
                    data : 'no',
                    name : 'no',
                },
                {
                    data : 'image',
                    name : 'image',
                },
                {
                    data : 'name',
                    name : 'name',
                },
                {
                    data : 'email',
                    name : 'email',
                },
                {
                    data : 'action',
                    name : 'action',
                },
            ],
        });
    }
</script>
@endsection
