@extends('layouts.app')

@section('title')
    KRS
@endSection

@section('content')
    <div class="card">
        @if(!count($sks))
        <div class="card-header">
            <div class="w-100 text-end">
                <a href="{{ route('krs.create') }}" class="btn btn-primary">Tambah KRS</a>
            </div>
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Banyak SKS</th>
                            <th>Dosen Pengampu</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sks->mata_kuliah }}</td>
                                <td>{{ $item->sks->banyak_sks }}</td>
                                <td>{{ $item->sks->dosen->gelar_depan }} {{ $item->sks->dosen->nama }} {{ $item->sks->dosen->gelar_belakang }}</td>
                                <td>{{ $item->sks->hari_mengajar }}</td>
                                <td>{{ $item->sks->jam_mengajar }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data sks</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endSection
