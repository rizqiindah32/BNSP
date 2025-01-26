<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Registrasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registrasi.update', $registrasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" name="Nama" id="Nama" class="form-control" value="{{ $registrasi->Nama }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" name="Email" id="Email" class="form-control"
                    value="{{ $registrasi->Email }}" required>
            </div>
            <div class="mb-3">
                <label for="Tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="Tanggal_lahir" id="Tanggal_lahir" class="form-control"
                    value="{{ $registrasi->Tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                    value="{{ $registrasi->nomor_telepon }}" required>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" name="agama" id="agama" class="form-control"
                    value="{{ $registrasi->agama }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control"
                    value="{{ $registrasi->alamat }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
