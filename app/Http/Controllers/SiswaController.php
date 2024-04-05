<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas', 'spp')->paginate(5);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.index', compact('siswa', 'kelas', 'spp'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required |unique:siswas,nisn',
            'nis' => 'required |unique:siswas,nis',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'spp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $siswa = Siswa::create([
            'nisn' => $request->input('nisn'),
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'spp_id' => $request->input('spp_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if($siswa)
        {
            return redirect()->route('siswa.index')->with(['success' => 'Data Siswa Berhasil di Tambahkan']);
        }
        else
        {
            return redirect()->route('siswa.index')->with(['error' => 'Data Siswa Gagal di Tambahkan']);
        }
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'spp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nisn' => $request->input('nisn'),
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'spp_id' => $request->input('spp_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if($siswa)
        {
            return redirect()->route('siswa.index')->with(['update' => 'Data Siswa Berhasil di Update']);
        }
        else
        {
            return redirect()->route('siswa.index')->with(['error' => 'Data Siswa Gagal di Update']);
        }
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        if($siswa)
        {
            return redirect()->route('siswa.index')->with(['delete' => 'Data Siswa Berhasil di Hapus']);
        }
        else
        {
            return redirect()->route('siswa.index')->with(['error' => 'Data Siswa Gagal di Hapus']);
        }
    }
}
