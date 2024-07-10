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
            <form action="{{ route('daftar-sks.update', $sks->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" name="mata_kuliah" placeholder="Masukkan Mata Kuliah" value="{{ $sks->mata_kuliah }}"/>
                    @error('mata_kuliah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Banyak SKS</label>
                    <input type="number" min="1" value="{{ $sks->banyak_sks }}" class="form-control" name="banyak_sks" placeholder="Masukkan Banyak SKS" />
                    @error('banyak_sks')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="dosen_id" id="" class="form-select">
                        <option value="">Pilih Dosen</option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" {{ $sks->dosen_pengampu == $item->id ? 'selected' : '' }}>{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}</option>
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
                        <option value="Senin" {{ $sks->hari_mengajar == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $sks->hari_mengajar == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $sks->hari_mengajar == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $sks->hari_mengajar == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $sks->hari_mengajar == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ $sks->hari_mengajar == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ $sks->hari_mengajar == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                    </select>
                    @error('hari')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam</label>
                    <input type="time" class="form-control" name="jam" placeholder="Masukkan Jam" value="{{ $sks->jam_mengajar }}"/>
                    @error('jam')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endSection