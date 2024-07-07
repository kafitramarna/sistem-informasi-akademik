@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengumuman</h3>
                    <div class="text-end w-100">
                        @if(session('role') == 'admin')
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengumuman Dan Panduan</th>
                                    <th>Link</th>
                                    @if(session('role') == 'admin')
                                    <th class="text-center">Dosen</th>
                                    <th class="text-center">Mahasiswa</th>
                                    <th class="text-center">Status</th>
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listPengumuman as $pengumuman)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengumuman->nama }}</td>
                                        <td><a href="{{ $pengumuman->url }}">Link</a></td>
                                        @if(session('role') == 'admin')
                                        <td class="text-center">
                                            @if ($pengumuman->is_dosen)
                                                <i class="fa-solid fa-check"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($pengumuman->is_mahasiswa)
                                                <i class="fa-solid fa-check"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $pengumuman->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </td>
                                        <td class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="">
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body" style="height: 10rem">
                    Mentoring
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body" style="height: 10rem">SKPI</div>
            </div>
        </div>
    </div>
@endSection
