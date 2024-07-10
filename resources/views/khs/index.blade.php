@extends('layouts.app')

@section('title')
    KRS
@endSection

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Banyak SKS</th>
                            <th>Total Nilai</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sks->mata_kuliah }}</td>
                                <td>{{ $item->sks->banyak_sks }}</td>
                                <td>{{ $item->total_nilai?$item->total_nilai:'-' }}</td>
                                <td>{{ $item->grade?$item->grade:'-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p class="">IPK : {{$ipk}}</p>
        </div>
    </div>
@endSection
