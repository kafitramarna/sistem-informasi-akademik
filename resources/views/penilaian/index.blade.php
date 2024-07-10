@extends('layouts.app')

@section('title')
    Penilaian
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matkul as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mata_kuliah }}</td>
                                <td class="text-end"><a href="{{ route('penilaian.create', $item->id) }}" class="btn btn-primary">Penilaian</td>
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
