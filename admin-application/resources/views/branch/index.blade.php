@extends('layouts.app')
@section('head')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-danger">Kantor Cabang</h6>
            <div class="ml-auto" style="white-space: nowrap;">
                <a href="/branch/create" class="btn btn-sm btn-danger px-2" type="submit">
                    <span class="d-none d-sm-inline">Tambah</span>
                    <span class="d-sm-none rounded"><i class="fas text-sm fa-plus"></i></span>
                </a>
            </div>
        </div>

        <div class="card-body">
            @if (session()->has('storeBranchSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('storeBranchSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif

            @if (session()->has('storeBranchFailed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('storeBranchFailed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('updateBranchSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateBranchSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('destroyBranchSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('destroyBranchSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-xl-12 col-lg-12 table-responsive">
                <table id="branches-table" class="table table-bordered table-sm table-hover data-table"
                    style="overflow-x: auto;">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-nowrap">ID</th>
                            <th scope="col" class="text-nowrap">Nama</th>
                            <th scope="col" class="text-nowrap">Tipe</th>
                            <th scope="col" class="text-nowrap">Alamat</th>
                            {{-- <th scope="col" class="text-nowrap">Kota</th>
                            <th scope="col" class="text-nowrap">Provinsi</th> --}}
                            {{-- <th scope="col" class="text-nowrap">Nomor</th> --}}
                            <th scope="col" class="text-nowrap">Jam Opersional</th>
                            <th scope="col" class="text-nowrap">Antrian</th>
                            {{-- <th scope="col" class="text-nowrap">Penilaian</th> --}}
                            <th scope="col" class="text-nowrap">Nonaktif</th>
                            <th scope="col" class="text-nowrap">Aksi</th>
                        </tr>
                    </thead>

                    <body style="white-space: nowrap;">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        fillDataTable();

        function fillDataTable() {

            const dataTable = $("#branches-table").DataTable({
                searching: false,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{!! route('branch.data') !!}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'Branch.id',
                    },
                    {
                        data: 'name',
                        name: 'Branch.name',
                    },
                    {
                        data: 'type',
                        name: 'Branch.type',
                    },
                    {
                        data: 'address',
                        name: 'Branch.address',
                    },
                    // {
                    //     data: 'city',
                    //     name: 'Branch.city',
                    // },
                    // {
                    //     data: 'province',
                    //     name: 'Branch.province',
                    // },
                    // {
                    //     data: 'cp',
                    //     name: 'Branch.cp',
                    // },
                    {
                        data: 'opHour',
                        name: 'Branch.opHour',
                    },
                    {
                        data: 'queue',
                        name: 'Branch.queue',
                    },
                    // {
                    //     data: 'rate',
                    //     name: 'Branch.rate',
                    // },
                    {
                        data: 'is_deleted',
                        name: 'Branch.is_deleted',
                    },
                    {
                        targets: -1,
                        data: "DT_RowId",
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data) {
                            return `<a href="/branch/${data}"
                                    class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>

                                <a href="/branch/${data}/edit"
                                    class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>

                                </a>                                    
                                <form action="/branch/${data}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete Location?')"><i
                                            class="far fa-trash-alt"></i></button>
                                </form>`

                        }
                    }
                ],
            });
        }
    </script>
@endsection
