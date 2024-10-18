@extends('layouts.app')
@section('head')
    <title>{{ $title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        } */


        .wrapper {
            /* height: 40px; */
            width: 120px;
            /* min-width: 380px; */
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }

        .wrapper span {
            width: 100%;
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }

        .wrapper span.num {
            font-size: 20px;
            border-right: 2px solid rgba(0,0,0,0.2);
            border-left: 2px solid rgba(0,0,0,0.2);
            pointer-events: none;
        }

        .branch-queue-controls {
            margin-top: 20px;
        }

        .branch-queue-controls form {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
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
                {{-- <p>ID: {{ $branch->id }}</p> --}}
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

                <div class="branch-queue-controls mt-3">
                    <form action="{{ route('queue.decrease', $branch->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">-</button>
                    </form>
                
                    <span class="num mx-3">{{ str_pad($branch->queue, 2, '0', STR_PAD_LEFT) }}</span>
                
                    <form action="{{ route('queue.increase', $branch->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">+</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

