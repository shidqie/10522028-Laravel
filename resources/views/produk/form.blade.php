<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Belajar Laravel 9</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main style="margin-top: 70px">
        <div class="container">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <b>Perhatian</b>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ empty(@$produk) ? route('produk.store') : route('produk.update', @$produk->id) }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf

                        @if (!empty(@$produk))
                            @method('PUT')
                        @endif

                        <div class="mb-3 row">
                            <label for="id_kategori_produk" class="col-sm-2 col-form-label">
                                Kategori Produk
                            </label>

                            <div class="col-sm-5">
                                <select name="id_kategori_produk" id="id_kategori_produk" class="form-control">

                                    <option value="">
                                        - Pilih Kategori Produk -
                                    </option>

                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" @selected(old('id_kategori_produk', @$produk->id_kategori_produk) == $item->id)>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_produk" class="col-sm-2 col-form-label">
                                Nama Produk
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('nama_produk', @$produk->nama_produk) }}" type="text"
                                    class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">
                                Stok
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('stok', @$produk->stok) }}" type="number" class="form-control"
                                    name="stok" id="stok" placeholder="Stok">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga_produk" class="col-sm-2 col-form-label">
                                Harga Produk
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('harga_produk', @$produk->harga_produk) }}" type="number"
                                    class="form-control" name="harga_produk" id="harga_produk"
                                    placeholder="Harga Produk">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="foto_produk" class="col-sm-2 col-form-label">
                                Foto
                            </label>

                            <div class="col-sm-5">

                                @if (!empty(@$produk->foto_produk))
                                    <img src="{{ $produk->foto_produk }}" class="mb-3" alt="Foto"
                                        width="100px" />
                                @endif

                                <input type="file" class="form-control" name="foto_produk" id="foto_produk" accept=".jpg,.jpeg,.png">
                                <div class="form-text">Format yang didukung: JPG, JPEG, PNG. Ukuran maksimal: 2MB.</div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-5 offset-sm-2">
                                <button class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
