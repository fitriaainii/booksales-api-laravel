<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksales</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Halaman Penulis Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['description'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>