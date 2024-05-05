@extends('layouts.app')

@section('title')
    Prodi
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="w-100 text-end">
                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah Prodi</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Prodi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="d-flex justify-content-end gap-2"><a href="{{ route('prodi.edit', $item->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('prodi.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endSection
