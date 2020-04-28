<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengambil data dari tabel mahasiswa
        $mahasiswa = DB::table('mahasiswa')->get();

        // Mengirim data mahaiswa ke view index
        return view('index',['mahasiswa' => $mahasiswa]);
    }

    public function tambah()
    {
        // Memanggil view tambah
        return view('tambah');
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        // Insert data ke tabel mahasiswa
        DB::table('mahasiswa')->insert([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);
        return view('simpan', ['data' => $request]);
    }

    public function detail($id)
    {
        // Mengambil data mahasiswa bedasarkan id yang dipilih
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->get();
        // Kirim data mahasiswa yang diambil ke view edit.blade.php
        return view('detail',['mahasiswa' => $mahasiswa]);
    }


    public function edit($id)
    {
        // Mengambil data mahasiswa bedasarkan id yang dipilih
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->get();
        // Kirim data mahasiswa yang diambil ke view edit.blade.php
        return view('edit',['mahasiswa' => $mahasiswa]);
    }


    public function update(Request $request)
    {
        // update data ke tabel mahasiswa
        DB::table('mahasiswa')->where('id', $request->id)->update([
            'nama' => $request->namamhs,
            'nim' => $request->nimmhs,
            'email' => $request->emailmhs,
            'jurusan' => $request->jurusanmhs,
        ]);
        return redirect('/');
    }

    public function hapus($id)
    {
        // Menghapus data mahasiswa bedasarkan id yang dipilih
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->delete();

        return redirect('/');
    }
}