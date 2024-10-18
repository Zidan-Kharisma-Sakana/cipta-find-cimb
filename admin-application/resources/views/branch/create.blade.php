@extends('layouts.app')
@section('head')
    <title>{{ $title }}</title>
    <link href="{{ asset('js/index.css') }}" rel="stylesheet">
    <link href="{{ asset('js/leaflet/leaflet.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/leaflet/leaflet.js') }}"></script>

    <script src="{{ asset('js/pinpoint.js') }}"></script>

    <style>
        .round-btn {
            background: linear-gradient(to bottom right, #f0625f, #ea5248);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .round-btn:hover {
            background: linear-gradient(to bottom right, #ea5248, #e9443e);
        }

        .round-btn i {
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mt-3 text-center">
            <button type="button" class="round-btn" onclick="window.history.back();">
                <i class="bi bi-chevron-left"></i>
            </button>
        </div>

        <div class="card shadow mb-4 w-75 mx-auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Tambah Kantor Cabang</h6>
            </div>
            <div class="card-body">
                <form action="/branch" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipe</label>
                        <select class="form-select @error('type') is-invalid @enderror" name="type" id="type"
                            aria-label="typeHelp" required>
                            <option value="atm" {{ old('type') === 'atm' ? 'selected' : '' }}>ATM</option>
                            <option value="cdm" {{ old('type') === 'cdm' ? 'selected' : '' }}>CDM</option>
                            <option value="tst" {{ old('type') === 'tst' ? 'selected' : '' }}>TST</option>
                            <option value="kc" {{ old('type') === 'kc' ? 'selected' : '' }}>KC</option>
                            <option value="kcs" {{ old('type') === 'kcs' ? 'selected' : '' }}>KCS</option>
                            <option value="kcs_sb" {{ old('type') === 'kcs_sb' ? 'selected' : '' }}>KCS SB</option>
                            <option value="kcp_dl" {{ old('type') === 'kcp_dl' ? 'selected' : '' }}>KCP DL</option>
                            <option value="kcps" {{ old('type') === 'kcps' ? 'selected' : '' }}>KCPS</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama </label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelp" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address"
                            id="address" aria-describedby="addressHelp" required value="{{ old('address') }}">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control  @error('city') is-invalid @enderror" name="city"
                            id="city" aria-describedby="cityHelp" required value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" class="form-control  @error('province') is-invalid @enderror" name="province"
                            id="province" aria-describedby="provinceHelp" required value="{{ old('province') }}">
                        @error('province')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cp" class="form-label">Nomor Kontak</label>
                        <input type="number" class="form-control  @error('cp') is-invalid @enderror" name="cp"
                            id="cp" aria-describedby="cpHelp" required value="{{ old('cp') }}">
                        @error('cp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="open_hour" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control  @error('open_hour') is-invalid @enderror"
                            name="open_hour" id="open_hour" aria-describedby="open_hourHelp" required
                            value="{{ old('open_hour') }}">
                        @error('open_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="close_hour" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control  @error('close_hour') is-invalid @enderror"
                            name="close_hour" id="close_hour" aria-describedby="close_hourHelp" required
                            value="{{ old('close_hour') }}">
                        @error('close_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p class="form-label">Layanan</p>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Tabungan" id="service_desc" name="service_desc[]">Tabungan</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Kartu Kredit" id="service_desc" name="service_desc[]">Kartu
                                        Kredit</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="KPR" id="service_desc" name="service_desc[]">KPR</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="KTA" id="service_desc" name="service_desc[]">KTA</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Reksadana" id="service_desc" name="service_desc[]">Reksadana</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="BancAssurancec" id="service_desc"
                                            name="service_desc[]">BancAssurancec</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Wakaf" id="service_desc" name="service_desc[]">Wakaf</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Treasury" id="service_desc" name="service_desc[]">Treasury</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox"
                                            value="Kartu Kredit" id="service_desc" name="service_desc[]">Kartu
                                        Kredit</label>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="mb-3">
                        <label for="image_path" class="form-label">Lokasi</label>
                        <div id="map"></div>
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input hidden type="text" class="form-control  @error('latitude') is-invalid @enderror"
                        name="latitude" id="latitude" aria-describedby="latitudeHelp" required
                        value="{{ old('latitude') }}">
                    <input hidden type="text" class="form-control  @error('longitude') is-invalid @enderror"
                        name="longitude" id="longitude" aria-describedby="longitudeHelp" required
                        value="{{ old('longitude') }}">

                    <div class="mb-3">
                        <label for="image_path" class="form-label">Gambar</label>
                        <input class="form-control @error('image_path') is-invalid @enderror" type="file"
                            id="image_path" name="image_path" aria-describedby="image_pathHelp" required>
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>




                    <button type="submit" class="btn btn-danger">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
