@extends('layouts.app')

@section('title')
    Tambah Pengumuman
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pengumuman" />
                </div>
                <div class="mb-3">
                    <label class="form-label">URL</label>
                    <input type="text" class="form-control" name="url" placeholder="Masukkan URL" />
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_dosen">
                        <span class="form-check-label">Tampilkan di dosen</span>
                    </label>
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_mahasiswa">
                        <span class="form-check-label">Tampilkan di mahasiswa</span>
                    </label>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection
