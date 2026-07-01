<?php

use Illuminate\Support\Facades\Route;

// Materi 2
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;


// Materi 7
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/route-belajar', function () {
// // echo 'Belajar Laravel. Tulisan ini ditampilkan di routes';
//     return view('view-belajar');
// });

// Route::get('/route-belajar-kirim-data', function () {
//     $data['nama'] = 'Akhfa Shidqie Muttaqien';
//     $data['jk'] = 'Laki-Laki';
//     return view('view-data', $data);
// });

// Route::get('/route-belajar-kirim-data', function () {
//     $nama = 'Akhfa Shidqie Muttaqien';
//     $jk = 'Laki-Laki';
//     return view ('view-data', compact('nama','jk'));
// });


// Cara 1
Route::get('/route-biodata', function () {

    $data['nim'] = '10522028';
    $data['nama'] = 'Akhfa Shidqie Muttaqien';
    $data['kelas'] = 'TP E-COMMERCE';
    $data['jurusan'] = 'Sistem Informasi';
    $data['alamat'] = 'Cianjur';

    return view('view-biodata', $data);

});

Route::get('/route-dosen', function () {

    $data['nip'] = '41277026124';
    $data['nidn'] = '0423019401';
    $data['nama'] = 'Ferry Stephanus Suwita, S.Kom., M.T.';
    $data['tempat_lahir'] = 'Bandung';
    $data['tanggal_lahir'] = 'Bandung';

    return view('view-dosen', $data);

});


Route::get('/route-produk', function () {

    $data['nama_produk'] = 'Trail Running';
    $data['warna'] = 'Hitam';
    $data['ukuran'] = '42';
    $data['stok'] = '25';

    return view('view-produk', $data);

});


// Cara 2
Route::get('/route-biodata-2', function () {

    $nim = '10522028';
    $nama = 'Akhfa Shidqie Muttaqien';
    $kelas = 'TP E-COMMERCE';
    $jurusan = 'Sistem Informasi';
    $alamat = 'Cianjur';

    return view('view-biodata-2', compact('nim', 'nama', 'kelas', 'jurusan', 'alamat'));

});

Route::get('/route-dosen-2', function () {

    $nip = '41277026124';
    $nidn = '0423019401';
    $nama = 'Ferry Stephanus Suwita, S.Kom., M.T.';
    $tempat_lahir = 'Bandung';
    $tanggal_lahir = 'Bandung';

    return view('view-dosen-2', compact('nip', 'nidn', 'nama', 'tempat_lahir', 'tanggal_lahir'));

});

Route::get('/route-produk-2', function () {

    $nama_produk = 'Trail Running';
    $warna = 'Hitam';
    $ukuran = '42';
    $stok = '25';

    return view('view-produk-2', compact('nama_produk', 'warna', 'ukuran', 'stok'));

});



// Matteri 2
// Route::get('/route-belajar-kirim-data', [ProdukController::class, 'index']);
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);



// Matteri 7
Route::get('/login', [LoginController::class, 'index']);
Route::get('/redirect/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/callback/google', [LoginController::class, 'googleCallback']);