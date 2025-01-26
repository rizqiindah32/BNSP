<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.77b7b955f8a000608e91885c314ded2a?rik=ltob6pxETjq84g&riu=http%3a%2f%2fstatic.businessinsider.com%2fimage%2f548b5430eab8eac00627d6fe%2fimage.jpg&ehk=FDSBeqd7RWJuRZuYGQe0806fiw9EOo%2b5y%2buoUSzECTk%3d&risl=&pid=ImgRaw&r=0');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .custom-pink {
            background-color: pink !important;
            color: black !important;
            border: 1px solid #ffc0cb !important;
        }

        .custom-pink:hover {
            background-color: #ffb6c1 !important;
            color: white !important;
        }

        .header {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <!-- Header dengan tombol Logout -->
    <div class="header">
        <a href="{{ route('homepage') }}" class="btn btn-primary">Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Selamat Datang, Staff Perpustakaan</h1>
        <p>Pilih salah satu menu untuk melanjutkan:</p>
        <div>
            <!-- Tombol navigasi -->
            <a href="{{ route('buku.index') }}" class="btn custom-pink me-2">Kelola Buku</a>
            <a href="{{ route('penulis.index') }}" class="btn custom-pink">Kelola Penulis</a>
        </div>
    </div>
</body>

</html>
