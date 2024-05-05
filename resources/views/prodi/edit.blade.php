@extends('layouts.app')

@section('title')
    Edit Prodi
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('prodi.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Prodi" value="{{ $prodi->nama }}"/>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endSection