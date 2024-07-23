<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Rekammedispasien;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RekamMedisPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekammedispasien.index', [
            'title' => 'Data Rekam Medis Pasien',
            'rekammedispasien' => rekammedispasien::with('pasien', 'dokter')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekammedispasien.create', [
            'title' => 'Tambah Rekam Medis Pasien',
            'pasien' => Pasien::all(),
            'dokter' => Dokter::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'id_rekammedis' => 'required|integer',
            'tanggal' => 'required|date',
            'diagnosa' => 'required|string|max:255',
            'tindakan_medis' => 'required',
            'id_dokter' => 'required|exists:dokters,id',
            'id_pasien' => 'required',
        ], [
            'id_rekammedis.required' => 'ID Rekam Medis harus diisi.',
            'id_rekammedis.integer' => 'ID Rekam Medis harus berupa angka.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Tanggal harus berupa tanggal yang valid.',
            'diagnosa.required' => 'Diagnosa harus diisi.',
            'diagnosa.string' => 'Diagnosa harus berupa teks.',
            'diagnosa.max' => 'Diagnosa tidak boleh lebih dari 255 karakter.',
            'tindakan_medis.required' => 'Tindakan Medis harus diisi.',
            'tindakan_medis.string' => 'Tindakan Medis harus berupa teks.',
            'tindakan_medis.max' => 'Tindakan Medis tidak boleh lebih dari 255 karakter.',
            'id_dokter.required' => 'ID Dokter harus diisi.',
            'id_dokter.exists' => 'ID Dokter harus ada di tabel dokters.',
        ]);
        Rekammedispasien::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/rekammedispasien");
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
        return view('rekammedispasien.edit', [
            'title' => 'Edit Rekam Medis Pasien',
            'rekammedispasien' => Rekammedispasien::find($id),
            'pasien' => Pasien::all(),
            'dokter' => Dokter::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'id_rekammedis' => 'required|integer',
            'tanggal' => 'required|date',
            'diagnosa' => 'required|string|max:255',
            'tindakan_medis' => 'required|string',
            'id_dokter' => 'required|exists:dokters,id',
            'id_pasien' => 'required|exists:pasiens,id',

        ], [
            'id_rekammedis.required' => 'ID Rekam Medis wajib diisi.',
            'id_rekammedis.integer' => 'ID Rekam Medis harus berupa angka.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
            'diagnosa.required' => 'Diagnosa wajib diisi.',
            'diagnosa.string' => 'Diagnosa harus berupa string.',
            'diagnosa.max' => 'Diagnosa tidak boleh lebih dari 255 karakter.',
            'tindakan_medis.required' => 'Tindakan Medis wajib diisi.',
            'tindakan_medis.string' => 'Tindakan Medis harus berupa string.',
            'id_dokter.required' => 'ID Dokter wajib diisi.',
            'id_dokter.exists' => 'ID Dokter tidak valid.',
            'id_pasien.required' => 'ID Pasien wajib diisi.',
            'id_pasien.exists' => 'ID Pasien tidak valid.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        Rekammedispasien::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/rekammedispasien");
    }
}
