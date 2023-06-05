@extends('templates.admin_main')
@section('top-header')
    <header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
        <p class="w3-left">Daftar Data Umat</p>
        <p class="w3-right">Role
            <span>: {{ Auth::guard('admin')->user()->role }} </span>
        </p>
    </header>
@endsection
@section('css')
    <style>
        /* Hide Arrow - Input Number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
@section('content')
    <div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
        <div class="container-fluid isi px-0 px-lg-4 mt-3">
            <!-- isi halaman -->

            <!-- tabel -->
            <div class="container-fluid isi px-4 mt-4 justify-content-center">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="row" style="width: 100%;">

                                <div class="col-md-4 text-center border">
                                    <div class="col-md-12">
                                        <h5>Filter Tanggal Daftar</h5>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="d-flex text-center" style="width: 100%;">
                                            <div class="col-md-5">
                                                <input id="ordinary" name="date_awal" value="{{ old('tanggal_lahir') }}"
                                                    type="date" class="form-control form-control-md date-awal">
                                            </div>
                                            <div class="col-md-2">-</div>
                                            <div class="col-md-5">
                                                <input id="ordinary" name="date_akhir" value="{{ old('tanggal_lahir') }}"
                                                    type="date" class="form-control form-control-md date-akhir">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 text-center border">
                                    <div class="col-md-12">
                                        <h5>Filter Gol Darah</h5>
                                    </div>
                                    <div class="col-md-12 mt-3" style="align-content: center;">
                                        <div class="d-flex" style="padding-bottom: 2%;">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <select name="gol_darah" class="form-select gol-darah" id="ordinary"
                                                    aria-label="Example select with button addon">
                                                    <option selected disabled value="">- Gol Darah -</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 text-center border">
                                    <div class="col-md-12">
                                        <h5>Filter Usia</h5>
                                    </div>
                                    <div class="col-md-12 mt-3" style="align-content: center;">
                                        <div class="d-flex" style="padding-bottom: 2%;">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white" id="ordinary"><</span>
                                                    <input name="usia" type="date" value=""
                                                        class="form-control usia" id="ordinary">
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding: 1%">
                                    <div class="d-flex">
                                        <div class="col-md-6 text-end" style="margin-right: 5px;">
                                            <form action="{{ url('kelola-jamaat/daftar-jamaat-filter') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-md filter-btn"
                                                    id="filter_btn">Filter</button>
                                                <div id="filter_parameter">

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 text-start">
                                            <button type="submit" class="btn btn-secondary btn-md" id="reset_btn"
                                                onclick="resetDataJamaat()">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <table id="daftarJamaat" class="display py-3 " style="width:100%;margin-top: 10%;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%;">No</th>
                                    <th scope="col" style="width:12%;">ID Code Umat</th>
                                    <th scope="col" style="width:18%;">Nama Umat</th>
                                    <th scope="col" style="width:15%;">Alamat</th>
                                    <th scope="col" style="width:12%;">No Handphone</th>
                                    <th scope="col" style="width:13%;">Email</th>
                                    <th scope="col" style="width:12%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="px-3">
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($jamaats as $jamaat)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $jamaat->id_code }}</td>
                                        <td>{{ $jamaat->name }}</td>
                                        <td>{{ $jamaat->alamat }}</td>
                                        <td>{{ $jamaat->no_handphone_1 }}</td>
                                        <td>{{ $jamaat->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('kelola-jamaat/edit-jamaat/' . $jamaat->id_code) }}"
                                                title="edit" class="btn btn-outline-dark" type="button">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('kelola-jamaat/detail-jamaat/' . $jamaat->id_code) }}"
                                                title="detail" class="btn btn-outline-dark" type="button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </a>
                                            <button title="delete" class="btn btn-outline-dark" id="btn-6"
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteDataJamaatModal{{ $jamaat->id_code }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Delete -->
                        @foreach ($jamaats as $jamaat)
                            <div class="modal fade" id="deleteDataJamaatModal{{ $jamaat->id_code }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Data Umat
                                                {{ $jamaat->id_code }}</h5>
                                        </div>
                                        <form action="/kelola-jamaat/daftar-jamaat/delete/{{ $jamaat->id_code }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data umat dari
                                                    "<b>{{ $jamaat->name }}</b>"?</p>
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
                </div>
            </div>
            <!-- isi tiap halaman sampai sini -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#daftarJamaat').DataTable({
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
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            className: 'btn btn-danger btn-sm',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        'colvis'
                    ]
                }
            });

        });

        document.getElementById('filter_btn').addEventListener('click', () => {
            var date_awal = '<input type="hidden" name="date_awal" value="' + document.querySelector(
                    '.date-awal')
                .value +
                '" class="form-control">'
            var date_akhir = '<input type="hidden" name="date_akhir" value="' + document.querySelector(
                    '.date-akhir')
                .value +
                '" class="form-control">'
            var gol_darah = '<input type="hidden" name="gol_darah" value="' + document.querySelector(
                    '.gol-darah')
                .value +
                '" class="form-control">'
            var usia = '<input type="hidden" name="usia" value="' + document.querySelector(
                    '.usia')
                .value +
                '" class="form-control">'

            $("#filter_parameter").append(date_awal);
            $("#filter_parameter").append(date_akhir);
            $("#filter_parameter").append(gol_darah);
            $("#filter_parameter").append(usia);

        });

        function resetDataJamaat() {
            open("{{ url('kelola-jamaat/daftar-jamaat') }}", "_self");
        };
    </script>
@endsection
