@extends('layouts.app')
@section('head')
    <title>${{ title }}</title>
@endsection

@section('content')
    <div class="container-fluid">
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
                        <input type="text" class="form-control  @error('cp') is-invalid @enderror" name="cp"
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
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control  @error('latitude') is-invalid @enderror" name="latitude"
                            id="latitude" aria-describedby="latitudeHelp" required value="{{ old('latitude') }}">
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control  @error('longitude') is-invalid @enderror"
                            name="longitude" id="longitude" aria-describedby="longitudeHelp" required
                            value="{{ old('longitude') }}">
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
