<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        <div class="row mb-3 align-items-center">
            <div class="col-lg-4">
                <form action="" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Cari"
                            value="{{ @$q }}">
                    </div>
                </form>
            </div>

            <div class="col-lg-8 text-end">
                <a href="{{ url('produk/create') }}" class="btn btn-primary">
                    Tambah
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Produk</th>
                    <th>Kategori Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga Produk</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($result as $item)
                    <tr>
                        <td>
                            {{ ($result->currentPage() - 1) * $result->perPage() + $loop->iteration }}
                        </td>

                        <td>
                            @if ($item->foto_produk)
                                <img src="{{ $item->foto_produk }}" alt="Foto Produk" width="100"
                                    class="img-thumbnail"
                                    onerror="this.outerHTML='<div style=\'width:100px;height:100px;background:#d1d5db;display:flex;align-items:center;justify-content:center;\'>Produk</div>'">
                            @else
                                <div
                                    style="width:100px;height:100px;background:#d1d5db;display:flex;align-items:center;justify-content:center;">
                                    Produk
                                </div>
                            @endif
                        </td>

                        <td>
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </td>

                        <td>
                            {{ $item->nama_produk }}
                        </td>

                        <td>
                            {{ $item->stok }}
                        </td>

                        <td>
                            {{ $item->harga_produk }}
                        </td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                    class="formDelete">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {!! $result->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {

            $("body").on("submit", ".formDelete", function(e) {

                e.preventDefault();

                let form = this;

                Swal.fire({
                    title: 'Perhatian',
                    text: 'Apakah anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });
    </script>

</body>

</html>
