<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Fungsi index digunakan untuk menampilkan semua data mahasiswa
    public function index(){
        $data = Mahasiswa::all();

        // Cek data tidak kosong
        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        // Jika data kosong
        else{
            $res['message'] = "Kosong!";
            return response($res);
        }
    }

    // Fungsi untuk menampilkan data dari sebuah ID
    public function getId($id){
        $data = Mahasiswa::where('id', $id)->get();

        // Cek data tidak kosong
        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        // Jika data kosong
        else{
            $res['message'] = "Kosong!";
            return response($res);
        }
    }

    // Fungsi menambah data
    public function create(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;

        // Jika data berhasil tersimpan
        if($mhs->save()){
            $res['message'] = "Data berhasil ditambah!";
            $res['value'] = "$mhs";
            return response($res);
        }
    }

    // Fungsi mengubah data
    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $mhs = Mahasiswa::find($id);
        $mhs->nama = $nama;
        $mhs->nim = $nim;
        $mhs->email = $email;
        $mhs->jurusan = $jurusan;

        if($mhs->save()){
            $res['message'] = "Data berhasil diubah!";
            $res['value'] = "$mhs";
            return response($res);
        } else {
            $res['message'] = "Gagal!";
            return response($res);
        }
    }

    // Fungsi menghapus data
    public function delete($id)
    {
        $mhs = Mahasiswa::where('id', $id);

        if($mhs->delete()){
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        } else{
            $res['message'] = "Gagal!";
            return response($res);
        }
    }
}