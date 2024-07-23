<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokter.index', [
            'title' => 'Data Dokter',
            'dokter' => Dokter::with('poli')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create', [
            'title' => 'Tambah Dokter',
            'poli' => Poli::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'id_poli' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'nomor_srt' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:dokters,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nama_dokter.required' => 'Nama Dokter harus diisi.',
            'nama_dokter.string' => 'Nama Dokter harus berupa teks.',
            'id_poli.required' => 'Nama poli harus diisi.',
            'nama_dokter.max' => 'Nama Dokter tidak boleh lebih dari 255 karakter.',
            'nomor_srt.required' => 'Nomor SRT harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'nomor_hp.string' => 'Nomor HP harus berupa teks.',
            'nomor_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2048 kb.',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $validateData['nama_dokter'] . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/dokter');
            $file->move($destinationPath, $filename);
            $validateData['foto'] = $filename;
        } else {
            $validateData['foto'] = $validateData['nama_dokter'] . '.png';
        }
        Dokter::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/dokter");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dokter.edit', [
            'title' => 'Edit Dokter',
            'dokter' => Dokter::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $dokter = Dokter::findOrFail($id);
        $validateData = $request->validate([
            'id_dokter' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'nomor_srt' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:dokters,email,' . $dokter->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'id_dokter.required' => 'ID Dokter harus diisi.',
            'nama_dokter.required' => 'Nama Dokter harus diisi.',
            'nama_dokter.string' => 'Nama Dokter harus berupa teks.',
            'nama_dokter.max' => 'Nama Dokter tidak boleh lebih dari 255 karakter.',
            'nomor_srt.required' => 'Nomor SRT harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'nomor_hp.string' => 'Nomor HP harus berupa teks.',
            'nomor_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2048 kb.',
        ]);

        if ($request->file('foto')) {
            if ($dokter->foto) {
                Storage::delete('/assets/images/dokter/' . $dokter->foto);
            }
            $file = $request->file('foto');
            $filename = $validateData['id_dokter'] . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/dokter');
            $file->move($destinationPath, $filename);
            $validateData['foto'] = $filename;
        } else {
            $validateData['foto'] = $dokter->foto;
        }
        Dokter::where('id', $id)->update($validateData);
        flash()->success('Data Berhasil Diubah');
        return redirect("/$role/dokter");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $dokter = Dokter::findOrFail($id);
        if ($dokter->foto) {
            Storage::delete('/assets/images/dokter/' . $dokter->foto);
        }
        Dokter::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/dokter");
    }
}
