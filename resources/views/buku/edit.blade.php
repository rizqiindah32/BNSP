<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Buku</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="penulis_id" class="form-label">Penulis</label>
                <select name="penulis_id" id="penulis_id" class="form-control" required>
                    <option value="" disabled>- Pilih Penulis -</option>
                    @foreach ($penulis as $item)
                        <option value="{{ $item->id }}" {{ $buku->penulis_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Tanggal Terbit</label>
                <input type="date" name="published_at" id="published_at" class="form-control"
                    value="{{ $buku->published_at }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
