<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title> <!-- Judul halaman -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Registrasi</h2>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    required>
            </div>
            <div class="mb-3"><!-- Dropdown Role -->
                <label for="role" class="form-label">Role</label><!-- Label untuk dropdown role -->
                <select name="role" id="role" class="form-select" required><!-- Dropdown untuk memilih role -->
                    <option value="staff">Staff</option><!-- Opsi Staff -->
                    <option value="peminjam">Peminjam</option> <!-- Opsi Peminjam -->
                </select>
            </div>
            <div>
                <button type="submit"
                    class="btn btn-primary w-100">Registrasi</button><!-- Tombol submit dengan lebar penuh -->
            </div>
        </form>
    </div>
</body>

</html>
