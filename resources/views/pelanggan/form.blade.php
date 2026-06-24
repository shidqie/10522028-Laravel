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

                    <form
                        action="{{ empty(@$pelanggan) ? route('pelanggan.store') : route('pelanggan.update', @$pelanggan->id) }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf

                        @if (!empty(@$pelanggan))
                            @method('PUT')
                        @endif

                        <div class="mb-3 row">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">
                                Nama Lengkap
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('nama_lengkap', @$pelanggan->nama_lengkap) }}" type="text"
                                    class="form-control" name="nama_lengkap" id="nama_lengkap"
                                    placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">
                                Jenis Kelamin
                            </label>

                            <div class="col-sm-5">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">

                                    <option value="">
                                        - Pilih Jenis Kelamin -
                                    </option>

                                    <option value="Laki-laki" @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'Laki-laki')>
                                        Laki-laki
                                    </option>

                                    <option value="Perempuan" @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'Perempuan')>
                                        Perempuan
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nomor_hp" class="col-sm-2 col-form-label">
                                Nomor HP
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('nomor_hp', @$pelanggan->nomor_hp) }}" type="text"
                                    class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat_email" class="col-sm-2 col-form-label">
                                Alamat Email
                            </label>

                            <div class="col-sm-5">
                                <input value="{{ old('alamat_email', @$pelanggan->alamat_email) }}" type="email"
                                    class="form-control" name="alamat_email" id="alamat_email"
                                    placeholder="Alamat Email">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="foto_pelanggan" class="col-sm-2 col-form-label">
                                Foto
                            </label>

                            <div class="col-sm-5">

                                @if (!empty(@$pelanggan->foto_pelanggan))
                                    <img src="{{ $pelanggan->foto_pelanggan }}" class="mb-3" alt="Foto"
                                        width="100px" />
                                @endif

                                <input type="file" class="form-control" name="foto_pelanggan" id="foto_pelanggan"
                                    accept=".jpg,.jpeg,.png">

                                <div class="form-text">
                                    Format yang didukung: JPG, JPEG, PNG. Ukuran maksimal: 2MB.
                                </div>

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-5 offset-sm-2">
                                <button class="btn btn-primary">
                                    Simpan
                                </button>

                                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
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
