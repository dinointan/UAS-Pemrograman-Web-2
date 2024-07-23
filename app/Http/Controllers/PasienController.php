<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasien.index', [
            'title' => 'Data Pasien',
            'pasien' => Pasien::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create', [
            'title' => 'Tambah Pasien',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
        ]);

        Pasien::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
        return redirect("/$role/pasien");
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
        return view('pasien.edit', [
            'title' => 'Edit Pasien',
            'pasien' => Pasien::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
        ]);

        Pasien::where('id', $id)->update($validateData);
        flash()->success('Data Berhasil Diubah');
        return redirect("/$role/pasien");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->getRoleNames()[0];
        Pasien::destroy($id);
        flash()->success('Data Berhasil Dihapus');
        return redirect("/$role/pasien");
    }

    public function profile()
    {
        $role = auth()->user()->getRoleNames()[0];
        return view('profile.index', [
            'title' => 'Profile Pasien',
            'pasien' => Pasien::where('id_user', auth()->user()->id)->first()
        ]);
    }

    public function storeProfile(Request $request)
    {
        $role = auth()->user()->getRoleNames()[0];
        $validateData = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'id_user' => 'required',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'nomor_hp.required' => 'Nomor HP harus diisi.',
            'id_user.required' => 'User harus diisi.',
        ]);
        Pasien::create($validateData);
        flash()->success('Data Berhasil Diubah');
        return redirect("/$role/profile");
    }
}
