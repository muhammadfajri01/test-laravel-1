<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Data Assets</h1>
    <hr>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" style="width: 100%;text-align: center" border="1">
            <thead>
                <tr>
                    <th>No</th>
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
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
