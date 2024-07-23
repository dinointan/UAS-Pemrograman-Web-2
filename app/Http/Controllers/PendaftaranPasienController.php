<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\PendaftaranPasien;
use App\Models\Petugas;
use App\Models\Poli;
use Illuminate\Http\Request;

class PendaftaranPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaranpasien.index', [
            'title' => 'Pendaftaran Pasien',
            'pasien' => Pasien::all(),
            'poli' => Poli::all(),
            'kamar' => Kamar::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'id_kamar' => 'required|string|max:255',
            'id_poli' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string|max:1000',
            'id_user' => 'required',
        ], [
            'id_kamar.required' => 'ID Kamar wajib diisi.',
            'id_kamar.string' => 'ID Kamar harus berupa string.',
            'id_kamar.max' => 'ID Kamar tidak boleh lebih dari 255 karakter.',
            'id_poli.required' => 'ID Poli wajib diisi.',
            'id_poli.string' => 'ID Poli harus berupa string.',
            'id_poli.max' => 'ID Poli tidak boleh lebih dari 255 karakter.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Tanggal harus berupa tanggal yang valid.',
            'keluhan.required' => 'Keluhan wajib diisi.',
            'keluhan.string' => 'Keluhan harus berupa string.',
            'keluhan.max' => 'Keluhan tidak boleh lebih dari 1000 karakter.',
        ]);
        PendaftaranPasien::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/pendaftaranpasien");
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
        //
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
        //
    }

    public function history()
    {
        return view('pendaftaranpasien.history', [
            'title' => 'History Pendaftaran Pasien',
            'pendaftaranpasien' => PendaftaranPasien::with(['kamar', 'poli'])->where('id_user', auth()->user()->id)->get()
        ]);
    }
}
