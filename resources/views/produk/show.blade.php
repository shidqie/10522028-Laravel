<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main style="margin-top: 70px">
        <div class="container">
            <h3 class="mb-4 text-center border-bottom fw-bold">Detail Produk</h3>
            <table class="table table-striped">
                <tr>
                    <th style="width: 250px">Kategori Produk</th>
                    <td>{{ $kategori_produk }}</td>
                </tr>
                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $nama_produk }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $stok }}</td>
                </tr>
                <tr>
                    <th>Harga Produk</th>
                    <td>Rp{{ number_format($harga_produk, 0, ',', '.') }}</td>
                </tr>
            </table>

            <a href="{{ url('produk/create') }}" class="btn btn-secondary mt-3">
                ← Kembali
            </a>

        </div>
    </main>

</body>

</html>
