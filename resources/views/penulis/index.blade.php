<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">

        <!-- Tombol Kembali ke Staff Dashboard -->
        <a href="{{ route('staff.dashboardstaff') }}" class="btn btn-secondary mb-3">Kembali ke Staff Dashboard</a>

        <h1 class="mb-4">Daftar Penulis</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('penulis.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tambah Penulis</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penulis as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('penulis.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penulis.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
