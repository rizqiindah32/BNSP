<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi {{ $registrasi->Nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid rgb(223, 146, 146);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Registrasi</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $registrasi->Nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $registrasi->Email }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $registrasi->Tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $registrasi->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $registrasi->agama->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $registrasi->alamat }}</td>
        </tr>
        <tr>
            <th>Buku</th>
            <td>{{ $registrasi->buku->judul }}</td>
        </tr>
    </table>
</body>

</html>
