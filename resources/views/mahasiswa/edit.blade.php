@extends('layouts.app')

@section('title')
    Edit Mahasiswa
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM"  value="{{ $mahasiswa->nim }}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama"  value="{{ $mahasiswa->nama }} "/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select class="form-select" name="prodi">
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id }}" {{ $mahasiswa->prodi_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $mahasiswa->email }}"/>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection