<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .action-buttons {
            display: flex;
            gap: 10px;
            /* Menambahkan jarak antar tombol */
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            /* Jarak antara input dan tombol cari */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Registrasi</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Kembali ke Staff Dashboard -->
        <a href="{{ route('peminjam.dashboardpeminjam') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Pencarian dan Tombol Tambah -->
        <div class="search-container">
            <form action="{{ route('registrasi.index') }}" method="GET" class="search-form">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Cari berdasarkan nama, email, atau lainnya">
                <button type="submit" class="btn btn-secondary">Cari</button>
            </form>
            <a href="{{ route('registrasi.create') }}" class="btn btn-primary">Tambah Registrasi</a>
        </div>

        <!-- Tabel Registrasi -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Nomor Telepon</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrasi as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            @if (request('search') && stripos($item->Nama, request('search')) !== false)
                                <strong>{{ $item->Nama }}</strong>
                            @else
                                {{ $item->Nama }}
                            @endif
                        </td>
                        <td>
                            @if (request('search') && stripos($item->Email, request('search')) !== false)
                                <strong>{{ $item->Email }}</strong>
                            @else
                                {{ $item->Email }}
                            @endif
                        </td>
                        <td>{{ $item->Tanggal_lahir }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>{{ $item->agama->nama ?? 'Tidak ada' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            @if ($item->buku)
                                {{ $item->buku->judul }}
                            @else
                                Tidak ada buku
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('registrasi.cetak', $item->id) }}"
                                    class="btn btn-warning btn-sm">Cetak</a>
                                <form action="{{ route('registrasi.destroy', $item->id) }}" method="POST"
                                    style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
