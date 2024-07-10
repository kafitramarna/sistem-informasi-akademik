@extends('layouts.app')

@section('title')
    Daftar SKS
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 text-end">
                <a href="{{ route('daftar-sks.create') }}" class="btn btn-primary">Tambah SKS</a>
            </div>
        </div>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mata_kuliah }}</td>
                                <td>{{ $item->banyak_sks }}</td>
                                <td>{{ $item->dosen->gelar_depan }} {{ $item->dosen->nama }} {{ $item->dosen->gelar_belakang }}</td>
                                <td>{{ $item->hari_mengajar }}</td>
                                <td>{{ $item->jam_mengajar }}</td>
                                <td class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('daftar-sks.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('daftar-sks.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
