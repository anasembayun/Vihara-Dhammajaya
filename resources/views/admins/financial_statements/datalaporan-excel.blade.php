<table>
    <thead>
        <tr>
            <th>Data Transaksi</th>
        </tr>
        <tr>
            <th>ID Umat</th>
            <th>Nama</th>
            <th>ID Kegiatan Donasi</th>
            <th>Alamat</th>
            <th>Kategori Donasi</th>
            <th>Tanggal Transaksi</th>
            <th>Total Harga</th>
            <th>Kode Transaksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_transaksi as $data)
            <tr>
                <td>{{ $data->id_jamaat }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->id_kegiatan_donasi }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->kategori_donasi }}</td>
                <td>{{ $data->tanggal_transaksi }}</td>
                <td>{{ $data->total_harga }}</td>
                <td>{{ $data->kode_transaksi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


<table>
    <thead>
        <tr>
            <th>Data Transaksi Foto</th>
        </tr>
        <tr>
            <th>Id Pemesan</th>
            <th>Id Admin</th>
            <th>Kode Transaksi</th>
            <th>Alamat Pemesan</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_transaksi_foto as $data)
            <tr>
                <td>{{ $data->id_pemesan }}</td>
                <td>{{ $data->id_admin }}</td>
                <td>{{ $data->kode_transaksi }}</td>
                <td>{{ $data->alamat_pemesan }}</td>
                <td>{{ $data->tanggal_transaksi }}</td>
                <td>{{ $data->total_harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Data Transaksi Foto Unregistered</th>
        </tr>
        <tr>
            <th>Nama Pemesan</th>
            <th>Id Admin</th>
            <th>Id Kegiatan</th>
            <th>Alamat Pemesan</th>
            <th>No Telp Pemesan</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_transaksi_foto_unreg as $data)
            <tr>
                <td>{{ $data->nama_pemesan }}</td>
                <td>{{ $data->id_admin }}</td>
                <td>{{ $data->id_kegiatan }}</td>
                <td>{{ $data->alamat_pemesan }}</td>
                <td>{{ $data->no_telepon_pemesan }}</td>
                <td>{{ $data->kode_transaksi }}</td>
                <td>{{ $data->tanggal_transaksi }}</td>
                <td>{{ $data->total_harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
