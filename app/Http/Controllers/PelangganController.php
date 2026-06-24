<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $query = Pelanggan::query();

        if ($q) {
            $query->whereAny(
                ['nama_lengkap', 'jenis_kelamin', 'nomor_hp', 'alamat_email'],
                'LIKE',
                '%' . $q . '%'
            );
        }

        $data['result'] = $query->paginate(15);

        $data['q'] = $q;

        return view('pelanggan.list', $data);
    }

    public function create()
    {
        return view('pelanggan.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap'   => 'required|string|max:150',
            'jenis_kelamin'  => 'required|string|max:20',
            'nomor_hp'       => 'required|string|max:20',
            'alamat_email'   => 'required|email|max:100',
            'foto_pelanggan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $request->validate($rules);

        $input = $request->all();

        if ($request->hasFile('foto_pelanggan')) {
            $fileName = time() . '_' . $request->foto_pelanggan->getClientOriginalName();
            $request->foto_pelanggan->storeAs('pelanggan', $fileName, 'public');
            $input['foto_pelanggan'] = $fileName;
        }

        Pelanggan::create($input);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil disimpan');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.form', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'nama_lengkap'   => 'required|string|max:150',
            'jenis_kelamin'  => 'required|string|max:20',
            'nomor_hp'       => 'required|string|max:20',
            'alamat_email'   => 'required|email|max:100',
            'foto_pelanggan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $request->validate($rules);

        $input = $request->all();

        if ($request->hasFile('foto_pelanggan')) {
            $foto_pelanggan = $request->file('foto_pelanggan');
            $nama_foto = time() . '.' . $foto_pelanggan->extension();
            $foto_pelanggan->storeAs('pelanggan', $nama_foto, 'public');
            $input['foto_pelanggan'] = $nama_foto;
        }

        $pelanggan->update($input);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }
}
