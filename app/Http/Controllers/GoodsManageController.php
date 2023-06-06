<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsManageController extends Controller
{
    public function __construct()
    {
        $this->Goods = new Goods();
        $this->middleware('auth');
    }

    // Mengambil data barang untuk ditampilkan
    public function showDataBarang($id)
    {
        $goods = Goods::find($id);

        return response()->json([
            'kode_barang' => $goods->kode_barang,
            'nama_barang' => $goods->nama_barang,
            'harga_jual' => $goods->harga_jual,
            'keterangan' => $goods->keterangan
        ]);
    }

    public function viewListGoods()
    {
        $goods = Goods::all();

        return view('admins.manage_goods.list_goods', compact('goods'));
    }

    public function viewAddGoods()
    {
        return view('admins.manage_goods.add_goods');
    }

    public function viewEditDataGoods($id)
    {
        $goods = Goods::where('id', $id)->first();
        return view('admins.manage_goods.edit_data_goods', compact('goods'));
    }

    public function addGoods()
    {
        Request()->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'harga_jual' => 'required',
        ]);

        $data = [
            'nama_barang' => Request()->nama_barang,
            'kode_barang' => Request()->kode_barang,
            'harga_jual' => Request()->harga_jual,
            'keterangan' => 'Tersedia',
            'status_keaktifan' => 'Aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->Goods->addDataGoods($data);
        return redirect()->route('tambah_data_barang')->with('success','Tambah data paket '.Request()->kode_barang.' berhasil!');;
    }

    public function updateGoods($id)
    {
        $goods = Goods::where('id', $id)->first();
        if ($goods->kode_barang != Request()->kode_barang)
        {
            Request()->validate([
                'nama_barang' => 'required',
                'kode_barang' => 'required|unique:data_barang,kode_barang',
                'keterangan' => 'required',
                'status_keaktifan' => 'required',
                'harga_jual' => 'required',
            ], [
                'kode_barang.unique' => 'Kode Barang sudah dipakai!'
            ]);
    
            $data = [
                'nama_barang' => Request()->nama_barang,
                'kode_barang' => Request()->kode_barang,
                'keterangan' => Request()->keterangan,
                'harga_jual' => Request()->harga_jual,
                'status_keaktifan' => Request()->status_keaktifan,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            Request()->validate([
                'nama_barang' => 'required',
                'keterangan' => 'required',
                'harga_jual' => 'required',
                'status_keaktifan' => 'required',
            ]);
    
            $data = [
                'nama_barang' => Request()->nama_barang,
                'keterangan' => Request()->keterangan,
                'harga_jual' => Request()->harga_jual,
                'status_keaktifan' => Request()->status_keaktifan,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        
        $this->Goods->editDataGoods($id, $data);
        return redirect()->route('edit_data_barang', $id)->with('success','Edit data paket '.Request()->kode_barang.' berhasil!');
    }

    public function deleteGoods($id)
    {
        $this->Goods->deleteDataGoods($id);
        return redirect()->route('daftar_barang');
    }
}
