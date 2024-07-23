<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jadwaldokter.index', [
            'title' => 'Jadwal Dokter',
            'jadwal' => JadwalDokter::with(['dokter', 'poli'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwaldokter.create', [
            'title' => 'Tambah Jadwal Dokter',
            'dokter' => Dokter::all(),
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
            'id_dokter' => 'required|exists:dokters,id',
            'hari_praktik' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
            'id_dokter.required' => 'Nama Dokter wajib diisi.',
            'id_dokter.exists' => 'Dokter tidak ditemukan.',
            'hari_praktik.required' => 'Hari Praktik wajib diisi.',
            'hari_praktik.string' => 'Hari Praktik harus berupa teks.',
            'hari_praktik.in' => 'Hari Praktik tidak valid.',
            'jam_mulai.required' => 'Jam Mulai wajib diisi.',
            'jam_mulai.date_format' => 'Format Jam Mulai tidak valid.',
            'jam_selesai.required' => 'Jam Selesai wajib diisi.',
            'jam_selesai.date_format' => 'Format Jam Selesai tidak valid.',
            'jam_selesai.after' => 'Jam Selesai harus setelah Jam Mulai.',
        ]);
        $dokter = Dokter::where('id', $request->id_dokter)->first();
        $validateData['id_poli'] = $dokter->id_poli;

        // Menyimpan data ke database
        JadwalDokter::create($validateData);

        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/jadwal");
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
        return view('jadwaldokter.edit', [
            'title' => 'Jadwal Dokter',
            'jadwal' => JadwalDokter::find($id),
            'dokter' => Dokter::all(),
            'poli' => Poli::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'id_dokter' => 'required|exists:dokters,id',
            'hari_praktik' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
            'id_dokter.required' => 'Nama Dokter wajib diisi.',
            'id_dokter.exists' => 'Dokter tidak ditemukan.',
            'hari_praktik.required' => 'Hari Praktik wajib diisi.',
            'hari_praktik.string' => 'Hari Praktik harus berupa teks.',
            'hari_praktik.in' => 'Hari Praktik tidak valid.',
            'jam_mulai.required' => 'Jam Mulai wajib diisi.',
            'jam_mulai.date_format' => 'Format Jam Mulai tidak valid.',
            'jam_selesai.required' => 'Jam Selesai wajib diisi.',
            'jam_selesai.date_format' => 'Format Jam Selesai tidak valid.',
            'jam_selesai.after' => 'Jam Selesai harus setelah Jam Mulai.',
        ]);
        $dokter = Dokter::where('id', $request->id_dokter)->first();
        $validateData['id_poli'] = $dokter->id_poli;

        // Menyimpan data ke database
        JadwalDokter::find($id)->update($validateData);

        flash()->success('Data Berhasil Diubah');
        return redirect("/$role/jadwal");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        JadwalDokter::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/jadwal");
    }

    public function jadwal()
    {
        return view('jadwaldokter.readjadwal', [
            'title' => 'Jadwal Dokter',
            'jadwal' => JadwalDokter::with(['dokter', 'poli'])->get()
        ]);
    }
}
