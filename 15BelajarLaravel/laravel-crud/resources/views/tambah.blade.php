@extends('master')
<!-- Isi title -->
@section('title', 'Tambah Data')

<!-- Isi bagian judul halaman -->
@section('judul_halaman', 'Tambah Data Mahasiswa')

<!-- Isi bagian konten -->
@section('konten')
    <a href="/mahasiswa" class="btn btn-danger">Kembali</a>
    <br/>
    <br/>
    <!-- Menampilkan error validasi -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
                <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Form validasi -->
    <form action="/mahasiswa/simpan" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}"> <br/>
        </div>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input class="form-control" type="text" name="nim" value="{{ old('nim') }}"> <br/>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}"> <br/>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input class="form-control" type="text" name="jurusan" value="{{ old('jurusan') }}"> <br/>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Tambah">
        </div>
    </form>
@endsection