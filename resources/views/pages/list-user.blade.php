@extends('layouts.app')

@section('title', 'List User')

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
                <h1>List User</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('success_delete'))
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('success_delete') }}
                    </div>
                </div>
            @endif
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomer Tlp</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jamaah as $no => $jm)
                                    <tr>
                                        <td>{{ $jamaah->firstItem() + $no }}</td>
                                        <td>{{ $jm->name }}</td>
                                        <td>{{ $jm->phone_number }}</td>
                                        <td>{{ $jm->address }}</td>
                                        <td>
                                            <a class="btn btn-info btn-action mr-1">Lihat</a>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-id="{{ $jm->id }}"
                                                class="btn btn-danger btn-action fas fa-trash swal-confim">
                                                <form action="{{ route('delete.user', $jm->id) }}"
                                                    id="delete{{ $jm->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $jamaah->links('pagination::bootstrap-5') }}
                            </tbody>
                        </table>
                        {{-- {{ $jamaah->links() }} --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/modules-sweetalert.js') }}"></script> --}}
@endpush

@push('after-scripts')
    <script>
        $(".swal-confim").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Yakin Akan Menghapus Data?',
                    text: 'Setelah data dihapus data tidak bisa dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete${id}`).submit();
                    }
                });
        });
    </script>
@endpush
