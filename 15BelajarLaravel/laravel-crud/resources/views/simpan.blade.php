@extends('master')

<!-- Isi title -->
@section('title', 'Validasi Data')

<!-- Isi bagian judul halaman -->
@section('judul_halaman', 'Validasi Data Mahasiswa')

<!-- Isi bagian konten-->
@section('konten')
<h3 class="my-4">Data yang diinput : </h3>

    <table class="table table-bordered table-striped">
        <tr>
            <td style="width:150px">Nama</td>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>{{ $data->nim }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>{{ $data->jurusan }}</td>
        </tr>
    </table>

    <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
@endsection