<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Registrasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Data -->
        <form action="{{ route('registrasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" name="Nama" id="Nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="Tanggal_lahir" id="Tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="agama_id" class="form-label">Agama</label>
                <select name="agama_id" id="agama_id" class="form-control" required>
                    <option value="" disabled selected>- Pilih Agama -</option>
                    @foreach ($agama as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="buku_id" class="form-label">Pilih Buku</label>
                <select name="buku_id" id="buku_id" class="form-select" required>
                    <option value="" disabled selected>- Pilih Buku -</option>
                    @foreach ($buku as $item)
                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
