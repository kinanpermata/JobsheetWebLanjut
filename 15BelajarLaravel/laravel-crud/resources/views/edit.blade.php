@extends('master')
<!-- Isi title -->
@section('title', 'Edit Data')

<!-- Isi bagian judul halaman-->
@section('judul_halaman', 'Edit Data Mahasiswa')

<!-- Isi bagian konten-->
@section('konten')
    <a href="/" class="btn btn-danger">Kembali</a>
    <br/>
    <br/>
    @foreach($mahasiswa as $mhs)
    <form action="/mahasiswa/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $mhs->id }}"> <br/>
        <div class="form-group">
            <label for="namamhs">Nama</label>
            <input type="text" class="form-control" required="reqiured" name="namamhs" value="{{ $mhs->nama }}"> <br/>
        </div>
        <div class="form-group">
            <label for="nimmhs">NIM</label>
            <input type="number" class="form-control" required="reqiured" name="nimmhs" value="{{ $mhs->nim }}"> <br/>
        </div>
        <div class="form-group">
            <label for="emailmhs">E-mail</label>
            <input type="email" class="form-control" required="required" name="emailmhs" value="{{ $mhs->email }}"> <br/>
        </div>
        <div class="form-group">
            <label for="jurusanmhs">Jurusan</label>
            <input type="text" class="form-control" required="reqiured" name="jurusanmhs" value="{{ $mhs->jurusan }}"> <br/>
        </div>
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
    </form>
    @endforeach
@endsection