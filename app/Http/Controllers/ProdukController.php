<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $query = Produk::with('kategori');

        if ($q) {
            $query->where(function ($row) use ($q) {
                $row->where('nama_produk', 'like', "%{$q}%")
                    ->orWhere('harga_produk', 'like', "%{$q}%");
            });
        }

        $data['result'] = $query->paginate(15);
        $data['q'] = $q;

        return view('produk.list', $data);
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('produk.form', compact('kategori'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_kategori_produk' => 'required|exists:kategori,id',
            'nama_produk'        => 'required|string|min:2|max:50',
            'stok'               => 'required|integer|min:0|max:250',
            'harga_produk'       => 'required|numeric|min:1000',
            'foto_produk'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $messages = [
            'required' => ':attribute wajib diisi',
            'max'      => ':attribute terlalu panjang / besar',
            'mimes'    => 'Foto harus berformat JPG, JPEG, atau PNG',
            'image'    => 'File yang diupload harus berupa gambar',
        ];

        $request->validate($rules, $messages);

        $input = $request->all();

        if ($request->hasFile('foto_produk')) {

            $fileName = time() . '_' . $request->foto_produk->getClientOriginalName();

            $request->foto_produk->storeAs(
                'produk',
                $fileName,
                'public'
            );

            $input['foto_produk'] = $fileName;
        }

        Produk::create($input);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();

        return view(
            'produk.form',
            compact('produk', 'kategori')
        );
    }

    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'id_kategori_produk' => 'required|exists:kategori,id',
            'nama_produk'        => 'required|string|min:2|max:50',
            'stok'               => 'required|integer|min:0|max:250',
            'harga_produk'       => 'required|numeric|min:1000',
            'foto_produk'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $messages = [
            'required' => ':attribute wajib diisi',
            'max'      => ':attribute terlalu panjang / besar',
            'mimes'    => 'Foto harus berformat JPG, JPEG, atau PNG',
            'image'    => 'File yang diupload harus berupa gambar',
        ];

        $request->validate($rules, $messages);

        $input = $request->all();

        if ($request->hasFile('foto_produk')) {

            $fileName = time() . '_' . $request->foto_produk->getClientOriginalName();

            $request->foto_produk->storeAs(
                'produk',
                $fileName,
                'public'
            );

            $input['foto_produk'] = $fileName;
        }

        $produk->update($input);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Data berhasil dihapus');
    }
}