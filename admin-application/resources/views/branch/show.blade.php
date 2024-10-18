@extends('layouts.app')
@section('head')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 w-75 mx-auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">
                    {{ $branch->name }}</h6>
            </div>
            <div class="card-body">
                <p>Gambar: {{ $branch->image_path }}</p>
                <p>ID: {{ $branch->id }}</p>
                <p>Nama: {{ $branch->name }}</p>
                <p>Tipe: {{ $branch->type }}</p>
                <p>Alamat: {{ $branch->address }}</p>
                <p>Kota: {{ $branch->city }}</p>
                <p>Provinsi: {{ $branch->province }}</p>
                <p>Nomor Kontak: {{ $branch->cp }}</p>
                <p>Jam Operasional: {{ $branch->open_hour . '-' . $branch->close_hour }}</p>
                <p>Layanan: {{ $branch->service_desc }}</p>
                <p>Antrian: {{ $branch->queue }}</p>
                <p>Penilaian: {{ $branch->rate }}</p>
                <p>Nonaktif: {{ $branch->is_deleted ? 'YA' : 'TIDAK' }}</p>

            </div>
        </div>
    </div>
@endsection
