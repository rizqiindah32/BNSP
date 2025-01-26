<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penulis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Penulis</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('penulis.update', $penulis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" value="{{ $penulis->nama }}" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal_lahir" class="form-control"
                        value="{{ $penulis->tanggal_lahir }}" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="alamat" class="form-control" value="{{ $penulis->alamat }}" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Perbarui Penulis</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
