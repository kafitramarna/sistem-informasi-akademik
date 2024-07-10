@extends('layouts.app')

@section('title')
    Daftar Jadwal Mengajar
@endSection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Banyak SKS</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwalMengajar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mata_kuliah }}</td>
                                <td>{{ $item->banyak_sks }}</td>
                                <td>{{ $item->hari_mengajar }}</td>
                                <td>{{ $item->jam_mengajar }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data jadwal mengajar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endSection
