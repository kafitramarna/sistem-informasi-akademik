@extends('layouts.app')

@section('title')
    Tambah SKS
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('daftar-sks.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('daftar-sks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" name="mata_kuliah" placeholder="Masukkan Mata Kuliah" />
                    @error('mata_kuliah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Banyak SKS</label>
                    <input type="number" min="1" value="1" class="form-control" name="banyak_sks" placeholder="Masukkan Banyak SKS" />
                    @error('banyak_sks')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="dosen_id" id="" class="form-select">
                        <option value="">Pilih Dosen</option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}</option>
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <select name="hari" id="" class="form-select">
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    @error('hari')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam</label>
                    <input type="time" class="form-control" name="jam" placeholder="Masukkan Jam" />
                    @error('jam')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection