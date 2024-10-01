@extends('layouts.app')

@section('title', 'User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <form method="POST" action="{{ route('update.user', $user->id) }}">
                        @csrf
                        @method('patch')
                        <div class="card-header">
                            <h4>Edit Data Jamaah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name"
                                            @if (old('name')) value="{{ old('name') }}"
                                            @else
                                                value="{{ $user->name }}" @endif>
                                        @error('name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control selectric" name="gender">
                                            <option @if ($user->gender == 'Laki-laki') selected @endif>Laki-Laki</option>
                                            <option @if ($user->gender == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Nomer Telp</label>
                                        <input type="number" class="form-control" name="phone_number"
                                            @if (old('phone_number')) value="{{ old('phone_number') }}"
                                            @else
                                                value="{{ $user->phone_number }}" @endif>
                                        @error('phone_number')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Generus</label>
                                        <select class="form-control selectric" name="generus">
                                            <option @if ($user->generus == 'Dewasa') selected @endif>Dewasa</option>
                                            <option @if ($user->generus == 'Senior') selected @endif>Senior</option>
                                            <option @if ($user->generus == 'Muda-Mudi') selected @endif>Muda-Mudi</option>
                                            <option @if ($user->generus == 'Praremaja') selected @endif>Praremaja</option>
                                            <option @if ($user->generus == 'Caberawit') selected @endif>Caberawit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="address"
                                            @if (old('address')) value="{{ old('address') }}"
                                        @else
                                            value="{{ $user->address }}" @endif>
                                        @error('address')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control selectric" name="status">
                                            <option @if ($user->status == 'Belum Nikah') selected @endif>Belum Nikah</option>
                                            <option @if ($user->status == 'Menikah') selected @endif>Menikah</option>
                                            <option @if ($user->status == 'Duda') selected @endif>Duda</option>
                                            <option @if ($user->status == 'Janda') selected @endif>Janda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group mb-0">
                                        <label>Catatan Tentang Jamaah</label>
                                        <textarea class="form-control" data-height="150" name="note">{{ $user->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
