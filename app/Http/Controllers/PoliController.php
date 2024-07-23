<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('poli.index', [
            'title' => 'Data Poli',
            'poli' => Poli::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.create', [
            'title' => 'Tambah Poli'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nama_poli' => 'required|string|max:255',
        ], [
            'nama_poli.required' => 'Nama poli harus diisi.',
        ]);
        Poli::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/poli");
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
        return view('poli.edit', [
            'title' => 'Edit Poli',
            'poli' => Poli::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nama_poli' => 'required|string|max:255',
        ], [
            'nama_poli.required' => 'Nama poli harus diisi.',
        ]);
        Poli::find($id)->update($validateData);
        flash()->success('Data Berhasil Diubah');
        return redirect("/$role/poli");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        Poli::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/poli");
    }
}
