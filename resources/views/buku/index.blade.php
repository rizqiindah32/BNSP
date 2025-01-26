<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">

        <!-- Tombol Kembali ke Staff Dashboard -->
        <a href="{{ route('staff.dashboardstaff') }}" class="btn btn-secondary mb-3">Kembali ke Staff Dashboard</a>

        <h1 class="mb-4">Daftar Buku</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Buku -->
        <form action="{{ route('buku.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row">
                <!-- Dropdown Penulis -->
                <div class="col-md-3">
                    <select name="penulis_id" class="form-control" required>
                        <option value="" disabled selected>- Pilih Penulis -</option>
                        @foreach ($penulis as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="published_at" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tambah Buku</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Published At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $item)
                    <!-- Looping data buku -->
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->penulis->nama ?? 'Tidak Ada' }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->published_at }}</td>
                        <td>
                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST"
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
