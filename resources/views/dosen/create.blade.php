@extends('layouts.app')

@section('title')
    Tambah Dosen
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('dosen.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" />
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" class="form-control" name="nidn" placeholder="Masukkan NIDN" />
                    @error('nidn')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" />
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Gelar Depan</label>
                    <input type="text" class="form-control" name="gelar_depan" placeholder="Masukkan Gelar Depan" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Gelar Belakang</label>
                    <input type="text" class="form-control" name="gelar_belakang" placeholder="Masukkan Gelar Belakang" />
                    @error('gelar_belakang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email" />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection