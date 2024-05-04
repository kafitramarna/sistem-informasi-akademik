@extends('layouts.app')

@section('title')
    Edit Pengumuman
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pengumuman" value="{{ $pengumuman->nama }}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL</label>
                    <input type="text" class="form-control" name="url" placeholder="Masukkan URL"  value="{{ $pengumuman->url }}"/>
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_dosen" {{ $pengumuman->is_dosen ? 'checked' : '' }}>
                        <span class="form-check-label">Tampilkan di dosen</span>
                    </label>
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_mahasiswa" {{ $pengumuman->is_mahasiswa ? 'checked' : '' }}>
                        <span class="form-check-label">Tampilkan di mahasiswa</span>
                    </label>
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" {{ $pengumuman->is_active ? 'checked' : '' }}>
                        <span class="form-check-label">Aktif</span>
                    </label>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection
