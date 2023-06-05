@extends('templates.admin_main')
@section('top-header')
<header class="top-nav w3-container w3-xlarge header-customize px-4 mt-3">
    <p class="w3-left">Hak Akses</p>
    <p class="w3-right">Role
        <span>: {{ Auth::guard('admin')->user()->role }} </span>
    </p>
</header>
@endsection
@section('content')
<div class="w3-main container-main" style="margin-left:250px;padding-top: 0;">
    <!-- isi halaman -->
    <div class="container-fluid isi px-4 mt-3">
        <!-- tabel -->
        <div class="container mt-3 ">
            <div class="table-responsive container">
                <table id="daftarHakAkses" class="display py-3 " style="width:100%;margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:20%;">Access</th>
                            @foreach($roles as $key => $role)
                            <th scope="col" style="width:10%;">{{$role->nama}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @foreach ($access_list as $access)
                        @php $access_checked = $access->details->pluck('id')->toArray(); @endphp
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-12" style="margin-bottom: -3%;">
                                        <p>{{ $access->nama }}</p>
                                    </div>
                                </div>
                            </td>
                            @foreach($roles as $key => $role)
                            <td style="padding-left:4%" data-access="{{$access->id}}" data-role="{{ $role->id }}" data-checked="{{(in_array($role->id,$access_checked)) ? 1 : 0}}">
                                @if(in_array($role->id, $access_checked))
                                <input class="form-check-input" type="checkbox" data-toggle="toggle" onchange="changeAccess(this)" checked>
                                @else
                                <input class="form-check-input" type="checkbox" data-toggle="toggle" onchange="changeAccess(this)">
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- pagination -->
        <div class="d-flex justify-content-end" style="margin-top:2%; margin-right:2%;">
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#daftarHakAkses').DataTable({
            columnDefs: [{
                    targets: [0],
                    orderData: [0, 1],
                },
                {
                    targets: [1],
                    orderData: [1, 0],
                },
                {
                    targets: [4],
                    orderData: [4, 0],
                },
            ]
        });

    });

    function changeAccess(e) {
        var data_access = $(e).parent().attr('data-access');
        var data_role = $(e).parent().attr('data-role');
        var data_checked = $(e).parent().attr('data-checked');

        $.ajax({
            type: 'put',
            url: '/kelola-admin/hak-akses/ubah',
            data: {
                "_token": "{{ csrf_token() }}",
                data_access: data_access,
                data_role: data_role,
                data_checked: data_checked
            },
            success: function(data) {

                if (data['code'] == 200) {
                    Swal.fire({
                        title: 'Sedang Di Proses',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                } else {
                    console.log("🚀 ~ file: access_mod_adm.blade.php ~ line 136 ~ $ ~ data", data)
                    alert(data['code']);
                }
                // var dataList = document.getElementById("biodata");
                // dataList.innerHTML = data;
            },
            error: function(data) {
                alert("fail");
                console.log(data);
            }
        });
    }

    $(document).ready(function() {

    });
</script>
@endsection