<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Leluhur;
use App\Models\UserJamaat;
use Database\Seeders\UserJamaatSeeder;
use App\Models\detail_pesan_foto;
use Illuminate\Support\Facades\DB;

class DataLeluhurManageController extends Controller
{
    public function __construct()
    {
        $this->Leluhur = new Leluhur();
        $this->middleware('auth');
        $this->detailFoto=new detail_pesan_foto();
    }

    public function viewAddLeluhur()
    {
        return view('admins.data_leluhur.add_leluhur');
    }

    public function viewOrderPhoto()
    {
        $jamaats = UserJamaat::all();
        $leluhurs = Leluhur::all();
        return view('admins.data_leluhur.order_photo', compact('jamaats', 'leluhurs'));
    }
    public function getDataUmat()
    {
        $jemaats = userJamaat::all();
        // ddd($jemaats);
        $message = "";
        foreach ($jemaats as $jemaat) {
            $message .= '<option value="'.$jemaat->id_code.'">'.$jemaat->name.' - '.$jemaat->alamat.' - '.$jemaat->tanggal_lahir. ' - ' . $jemaat->no_handphone_1;
        }
        // $temp=array();
        // $temp.push()
        // return response()->json($message);
        return ["message"=>$message];
    }

    public function showDataLeluhur($id)
    {
        $leluhur = Leluhur::where('id', $id)->get();

        return response()->json([
            'leluhur' => $leluhur
            // 'id_pemesan' => $leluhur->id_pemesan,
            // 'nama_mendiang' => $leluhur->nama_mendiang,
            // 'tempat_lahir' => $leluhur->tempat_lahir,
            // 'tanggal_lahir' => $leluhur->tanggal_lahir,
            // 'tempat_meninggal'=> $leluhur->tempat_meninggal,
            // 'tanggal_meninggal'=> $leluhur->tanggal_meninggal,
        ]);
    }

    public function getNamabyId(Request $request)
    {
        $Umat = UserJamaat::where('id_code',$request->val)->first();

        return $Umat->name;
    }

    public function pesanLokasi(Request $request)
    {
        $namaLelur=$request->namaLeluhur;
        $tempatLahir=$request->tempatLahir;
        $tempatMeninggal=$request->tempatMeninggal;
        $tanggalLahir=$request->tanggalLahir;
        $tanggalMeninggal=$request->tanggalMeninggal;
        $periode=$request->periode;
        $data=[
            'namaLeluhur'=> $namaLelur,
            'tempatLahir'=> $tempatLahir,
            'tempatMeninggal'=> $tempatMeninggal,
            'tanggalLahir'=> $tanggalLahir,
            'tanggalMeninggal'=> $tanggalMeninggal,
            'periode'=> $periode,
        ];
        return redirect()->route('redir');
    }

    public function addLeluhur()
    {
        Request()->validate([
            'nama_mendiang' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_meninggal' => 'required',
            'tanggal_meninggal' => 'required',
            'transaksi_terakhir' => 'required'
        ]);

        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'nama_mendiang' => Request()->nama_mendiang,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'tempat_meninggal' => Request()->tempat_meninggal,
            'tanggal_meninggal' => Request()->tanggal_meninggal,
            'transaksi_terakhir' => Request()->transaksi_terakhir,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->Leluhur->addDataLeluhur($data);
        return redirect()->route('tambah_data_leluhur');
    }

    public function viewEditLeluhur($id)
    {
        $leluhur = Leluhur::find($id);
        return view('admins.data_leluhur.edit_leluhur', compact('leluhur'));
    }

    public function editLeluhur($id)
    {
        Request()->validate([
            'nama_leluhur' => 'required',
            'relasi' => 'required',
            'transaksi_terakhir' => 'required'
        ]);


        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'nama_mendiang' => Request()->nama_leluhur,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'tempat_meninggal' => Request()->tempat_meninggal,
            'tanggal_meninggal' => Request()->tanggal_meninggal,
            'transaksi_terakhir' => Request()->transaksi_terakhir . "-01",
        ];

        $this->Leluhur->editDataLeluhur($id, $data);
        return redirect()->route('daftar_leluhur');
    }

    public function getLokasiFoto(Request $request)
    {
        $lokasi = detail_pesan_foto::where('kode',$request->kode)->get();

        // $header=`<div class="baris row py-2 my-3  ">
        // <div class="col-1 d-flex justify-content-end align-items-center px-0">
        //     <h6 class="merri-sans"><b></b></h6>
        // </div>
        // <div class="col-11">
        //     <div class="row rows-col-2">`;

        // $button=` <div class="col d-flex justify-content-center">
        // <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD1"></button>
        //     </div>`; //6x

        // $footer=`</div>
        //     </div>
        // </div>`;

        // $div=`<div class="baris row py-2 my-3  ">
        //         <div class="col-1 d-flex justify-content-end align-items-center px-0">
        //             <h6 class="merri-sans"><b>D</b></h6>
        //         </div>
        //         <div class="col-11">
        //             <div class="row rows-col-2">
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD1"></button>
        //                 </div>
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD2"></button>
        //                 </div>
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD3"></button>
        //                 </div>
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD4"></button>
        //                 </div>
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD5"></button>
        //                 </div>
        //                 <div class="col d-flex justify-content-center">
        //                     <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnD6"></button>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>`;
        $i=1;
        $temp="";
        foreach($lokasi as $data)
        {
            if($i==1)
            {
                $temp.='<div class="baris row py-2 my-3  ">
                            <div class="col-1 d-flex justify-content-end align-items-center px-0">
                                <h6 class="merri-sans"><b></b></h6>
                            </div>
                                <div class="col-11">
                                    <div class="row rows-col-2">';
            }


            // $temp.=' <div class="col d-flex justify-content-center">
            // <button type="button" class="btn-lokasi tersedia btn btn-outline text-white text-center " onclick=getLokasiClick('.$data->kode_lokasi.')>'.substr($data->kode_lokasi,1).'</button>
            //     </div>';
            $test=$data->kode_lokasi;

            if($data->status==0)
            {
            $temp.=' <div class="col d-flex justify-content-center">
            <button type="button" class="btn-lokasi tersedia btn btn-outline text-white text-center codeLOC" onClick="return getLokasiClick(this)" id="'.$test.'">'.substr($data->kode_lokasi,1).'</button>
                </div>';
            }
            else if($data->status==1)
            {
                $test=$data->kode_lokasi." SudahDipesan";
                $temp.=' <div class="col d-flex justify-content-center">
                <button type="button" class="btn-lokasi sudahDipesan btn btn-outline text-white text-center codeLOC" onClick="return getLokasiClick(this)" id="'.$test.'">'.substr($data->kode_lokasi,1).'</button>
                    </div>';
            }

            $i++;
            if($i==7)
            {
                $temp.='</div>
                </div>
                </div>';
                $i=1;
            }


            // $temp.=$data->kode_lokasi.' \n';
        }
    //     $temp = '<div class="baris row py-2 my-3 ">
    //     <div class="col-1 d-flex justify-content-end align-items-center px-0">
    //         <h6 class="merri-sans"><b>H</b></h6>
    //     </div>
    //     <div class="col-11">
    //         <div class="row rows-col-2">
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH1"></button>
    //             </div>
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH2"></button>
    //             </div>
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH3"></button>
    //             </div>
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH4"></button>
    //             </div>
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH5"></button>
    //             </div>
    //             <div class="col d-flex justify-content-center">
    //                 <button type="button" class="btn-lokasi tersedia btn btn-outline " id="btnH6"></button>
    //             </div>
    //         </div>
    //     </div>
    // </div>';
    return $temp;

    }

    public function PESANFOTOLOKASI(Request $request)
    {
        // $data=[
        // 'id_pemesan'=>$request->kode['idUmat'],
        // 'nama_mendiang'=>$request->kode['namaleluhur'],
        // 'tempat_lahir'=>$request->kode['tempatlahir'],
        // 'tanggal_lahir'=>$request->kode['tanggallahir'],
        // 'tempat_meninggal'=>$request->kode['tempatmeninggal'],
        // 'tanggal_meninggal'=>$request->kode['tanggalmeninggal'],
        // 'periode'=>$request->kode['periode']
        // ];

        $LAHIR = NULL;
        $MENINGGAL = NULL;

        if($request->kode['tanggallahir'] != ""){
            $time = strtotime($request->kode['tanggallahir']);
            $LAHIR = date('Y-m-d', $time);
        }

        if ($request->kode['tanggalmeninggal'] != "") {
            $time = strtotime($request->kode['tanggalmeninggal']);
            $MENINGGAL = date('Y-m-d', $time);
        }

        $time = strtotime($request->kode['transaksiterakhir']);
        $terakhir = date('Y-m-d',$time);

        $data=[
            'id_pemesan'=>$request->kode['idUmat'],
            'nama_mendiang'=>$request->kode['namaleluhur'],
            'relasi'=>$request->kode['relasi'],
            'tempat_lahir'=>$request->kode['tempatlahir'] == "" ? NULL : $request->kode['tempatlahir'],
            'tanggal_lahir'=>$LAHIR,
            'tempat_meninggal'=>$request->kode['tempatmeninggal'] == "" ? NULL : $request->kode['tempatmeninggal'],
            'tanggal_meninggal'=>$MENINGGAL
            ,'transaksi_terakhir'=>$terakhir,
            ];
        $this->Leluhur->addDataLeluhur($data);
        // DB::table('data_leluhur')->insert($data);
        $k = Leluhur::orderBy('id', 'DESC')->first();
        // $getloc = detail_pesan_foto::where(['kode','=',$request->kode['code']],['kode_lokasi','=',$request->kode['kodeLokasi']])->first();

        $getloc = detail_pesan_foto::where('kode',$request->kode['code'])->where('kode_lokasi',$request->kode['kodeLokasi'])->first();
        $getloc->status=1;
        $getloc->id_leluhur=$k->id;
        $getloc->save();

        // $getloc->id_leluhur=$request->kode['idUmat'];
        // $getloc->save();
        return ['nama_mendiang'=>$request->kode['namaleluhur'],'kodeLoc'=>$request->kode['kodeLokasi'],'LOC'=>$request->kode['code']];
        // return 'test';
        // return 
    }

    public function viewDataLeluhur()
    {
        $leluhurs = Leluhur::all();
        return view('admins.data_leluhur.list_leluhur', compact('leluhurs'));
    }

    public function deleteDataLeluhur($id)
    {
        Leluhur::where('id', $id)->delete();
        detail_pesan_foto::where('id_leluhur', $id)->update(['status' => 0, 'id_leluhur' => NULL]);
        return redirect()->route('daftar_leluhur');
    }

    public function viewEditLokasiFoto(Request $request)
    {
        $data = $request->data;
        return view('admins.data_leluhur.edit_lokasi_foto', compact('data'));
    }

    public function UBAHFOTOLOKASI(Request $request)
    {
        $k = Leluhur::find($request->id);

        //Remove Old
        $getOldLoc = detail_pesan_foto::where('id_leluhur', $k->id)->first();
        $getOldLoc->status = 0;
        $getOldLoc->id_leluhur = NULL;
        $getOldLoc->save();

        //Assign New Loc
        $getloc = detail_pesan_foto::where('kode', $request->kode['code'])->where('kode_lokasi', $request->kode['kodeLokasi'])->first();
        $getloc->status = 1;
        $getloc->id_leluhur = $k->id;
        $getloc->save();


        return ['nama_mendiang' => $request->kode['namaleluhur'], 'kodeLoc' => $request->kode['kodeLokasi'], 'LOC' => $request->kode['code']];
    }
}
