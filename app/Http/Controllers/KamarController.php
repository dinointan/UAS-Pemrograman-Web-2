<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kamar.index', [
            'title' => 'Data Kamar',
            'kamar' => Kamar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create', [
            'title' => 'Tambah Kamar',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'jenis_kamar' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fasilitas' => 'required'

        ], [
            'nama_kamar.required' => 'Nama Kamar wajib diisi.',
            'nama_kamar.string' => 'Nama Kamar harus berupa teks.',
            'nama_kamar.max' => 'Nama Kamar tidak boleh lebih dari 255 karakter.',
            'jenis_kamar.required' => 'Jenis Kamar wajib diisi.',
            'jenis_kamar.string' => 'Jenis Kamar harus berupa teks.',
            'jenis_kamar.max' => 'Jenis Kamar tidak boleh lebih dari 255 karakter.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2048 kb.',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $validateData['nama_kamar'] . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/kamar');
            $file->move($destinationPath, $filename);
            $validateData['foto'] = $filename;
        } else {
            $validateData['foto'] = $validateData['nama_kamar'] . '.png';
        }
        Kamar::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/kamar");
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
        return view('kamar.edit', [
            'title' => 'Edit Kamar',
            'kamar' => Kamar::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        Kamar::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/kamar");
    }
}
