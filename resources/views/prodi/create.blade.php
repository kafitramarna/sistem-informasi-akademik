@extends('layouts.app')

@section('title')
    Tambah Prodi
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('prodi.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Prodi" />
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endSection