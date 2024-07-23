<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('petugas.index', [
            'title' => 'Data Petugas',
            'petugas' => Petugas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create', [
            'title' => 'Tambah Petugas'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nip' => 'required|string|max:255',
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ], [
            'nip.required' => 'NIP harus diisi.',
            'nama_petugas.required' => 'Nama petugas harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
        ]);

        Petugas::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/petugas");
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
        return view('petugas.edit', [
            'title' => 'Edit Petugas',
            'petugas' => Petugas::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nip' => 'required|string|max:255',
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ], [
            'nip.required' => 'NIP harus diisi.',
            'nama_petugas.required' => 'Nama petugas harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
        ]);

        Petugas::find($id)->update($validateData);
        flash()->success('Data Berhasil Diubah');
        return redirect('/petugas/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect('/petugas/petugas');
    }
}
