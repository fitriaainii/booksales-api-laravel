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
    <h1>Selamat Datang di Toko Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis_ID</th>
                <th>Genre_ID</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Cover Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['title'] }}</td>
                <td>{{ $item['author_id'] }}</td>
                <td>{{ $item['genre_id'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['stock'] }}</td>
                <td>{{ $item['cover_photo'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>