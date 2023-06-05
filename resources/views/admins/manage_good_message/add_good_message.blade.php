@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Kelola Pesan Baik</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>
        .form-label {
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bold;
            color: #2A363B;
        }

        .card {
            border: none;
        }

        .card .card-footer {
            border: none;
            background-color: white;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <div class="container-fluid isi px-4 mt-3">
            <section id="addPesanBaik" class="my-5 Finish">
                <div class="container-fluid isi px-4 mt-3">
                    <div class="accordion" id="addPesanBaikFormAccordion">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-tambahPesanBaik" aria-expanded="true"
                                    aria-controls="panelsStayOpen-tambahPesanBaik" style="background-color:#100701">
                                    <strong class='text-white'>Tambah Pesan Baik</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-tambahPesanBaik" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body" style="background-color: #ffffff">
                                    <form action="{{ url('kelola-pesan-baik/i-tambah-pesan-baik') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="container-fluid row g-3">
                                                            <div class="col-12">
                                                                <label for="exampleFormControlTextarea1"
                                                                    class="form-label">Pesan Baik Baru <span
                                                                        class="text-danger">*</span></label>
                                                                <textarea name="pesan_baik" class="form-control" id="large" rows="3" maxlength="287" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-muted text-center">
                                                        <div class="mb-2 mt-2">
                                                            <button type="submit"
                                                                class="btn  btn-sm border-0 btn-4 ab">SIMPAN </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="data_kegiatan container">
                <div class="container text-center mb-0 mt-1">
                    <h3 style="margin-bottom:0px;"><strong>Daftar Pesan Baik</strong></h3>
                </div>
                <div class="table-responsive container mb-5">
                    <table id="daftarPesanBaikTable" class="display py-3" style="width:100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width:7%; text-align: center;">No</th>
                                <th scope="col" style="width:78%; text-align: center;">Pesan Baik</th>
                                <th scope="col" style="width:15%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($data_pesan_baik as $pesan_baik)
                                <tr>
                                    <th style="text-align: center">{{ ++$no }}</th>
                                    <td>{{ $pesan_baik->pesan_baik }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('kelola-pesan-baik/edit-pesan-baik/' . $pesan_baik->id) }}"
                                            title="edit" class="btn btn-outline-dark" type="button">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <button title="delete" class="btn btn-outline-dark" id="btn-6" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteDataPesanBaik{{ $pesan_baik->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Delete -->
                    @foreach ($data_pesan_baik as $pesan_baik)
                        <div class="modal fade" id="deleteDataPesanBaik{{ $pesan_baik->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Pesan Baik</h5>
                                    </div>
                                    <form action="/kelola-pesan-baik/tambah-pesan-baik/delete/{{ $pesan_baik->id }}"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Hapus Pesan Baik berikut?</p>
                                            <p>"<b>{{ $pesan_baik->pesan_baik }}</b>"?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#daftarPesanBaikTable').DataTable({
            responsive: true,
            dom: 'lBfrtip',
            buttons: {
                buttons: [
                    'spacer',
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-secondary btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'spacer',
                        style: 'bar'
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-success btn-sm',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger btn-sm',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    'colvis'
                ]
            }
        });
    </script>
@endsection
