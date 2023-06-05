<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Milon\Barcode\DNS1D;
use App\Models\UserJamaat;
use Illuminate\Http\Request;
use App\Models\absensiJamaat;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class KegiatanManageController extends Controller
{
    public function __construct()
    {
        $this->Kegiatan = new Kegiatan();
        $this->AbsensiJemaat = new absensiJamaat();
        $this->Jemaat = new UserJamaat();
        $this->middleware('auth');
    }

    public function viewAddJadwalKegiatan(){
        return view('admins.jadwalkan_kegiatan');
    }

    public function viewEditDataKegiatan($id){
        $kegiatans = Kegiatan::where('id', $id)->first();
        return view('admins.edit_kegiatan', compact('kegiatans'));
    }

    public function updateDataKegiatan($id){
        Request()->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'required',
            'foto_kegiatan',
        ]);

        if (Request()->foto_kegiatan <> "")
        {
            $kegiatans = $this->Kegiatan->detailDataKegiatan($id);
            if ($kegiatans->foto_kegiatan <> "")
            {
                unlink(public_path('images/app_admin/kelola_kegiatan/foto_kegiatan').'/'.$kegiatans->foto_kegiatan);
            }

            $file = Request()->file('foto_kegiatan');
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('images/app_admin/kelola_kegiatan/foto_kegiatan'), $filename);

            $data = [
                'nama' => Request()->nama,
                'tempat' => Request()->tempat,
                'tanggal_mulai' => Request()->tanggal_mulai,
                'jam_mulai' => Request()->jam_mulai,
                'jam_selesai' => Request()->jam_selesai,
                'foto_kegiatan' => $filename,
                'keterangan' => Request()->keterangan,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $data = [
                'nama' => Request()->nama,
                'tempat' => Request()->tempat,
                'tanggal_mulai' => Request()->tanggal_mulai,
                'jam_mulai' => Request()->jam_mulai,
                'jam_selesai' => Request()->jam_selesai,
                'keterangan' => Request()->keterangan,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->Kegiatan->DBeditJadwalKegiatan($id, $data);
        return redirect()->route('edit_data_kegiatan', $id)->with('success','Edit data kegiatan '.Request()->nama.' berhasil!');
    }

    public function deleteDataKegiatan($id){
        $kegiatan = $this->Kegiatan->detailDataKegiatan($id);
        if ($kegiatan->foto_kegiatan <> "")
        {
            unlink(public_path('images/app_admin/kelola_kegiatan/foto_kegiatan').'/'.$kegiatan->foto_kegiatan);
        }

        $this->AbsensiJemaat->deleteDataAbsensiJamaatByIdKegiatan($id);
        $this->Kegiatan->deleteDataKegiatan($id);
        return redirect()->route('addJadwal_kegiatan');
    }

    public function addJadwalKegiatan(Request $request){
        Request()->validate([
            // |unique:jadwal_kegiatan,nama
            'nama' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'required',
            'foto_kegiatan',
        ]);
        $filename = "";
        if ($request->hasFile('foto_kegiatan')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            // $path = $request->file('avatar')->storeAs(
            //     'avatars', $request->user()->id
            // );
            if($request->file('foto_kegiatan')){
                $file= $request->file('foto_kegiatan');
                $filename= date('YmdHi').'_'.$file->getClientOriginalName();
                $file-> move(public_path('images/app_admin/kelola_kegiatan/foto_kegiatan/'), $filename);
                // $data['file_path']= $filename;
            }
            // $path = $request->file('gambar_kegiatan')->storeAs('gambar', $request->id);
        }

        $data = [
            'nama' => Request()->nama,
            'tempat' => Request()->tempat,
            'tanggal_mulai' => Request()->tanggal_mulai,
            'jam_mulai' => Request()->jam_mulai,
            'jam_selesai' => Request()->jam_selesai,
            'foto_kegiatan' => $filename,
            'keterangan' => Request()->keterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 0,
            'created_by' => Auth::guard('admin')->user()->username,
        ];

        $this->Kegiatan->DBaddJadwalKegiatan($data);
        return redirect()->route('addJadwal_kegiatan');

        // $data_kegiatan = new JadwalKegiatan;
        // $data_kegiatan->nama = $request->nama_kegiatan;
        // $data_kegiatan->tempat = $request->tempat_kegiatan;
        // $data_kegiatan->tanggal = $request->tanggal_kegiatan;
        // $data_kegiatan->jenis_sumbangan = $request->jenis_sumbangan;
        // $data_kegiatan->keterangan = $request->keterangan_kegiatan;
        // $data_kegiatan->save();
        // return back();
    }

    public function viewDetailKegiatan(){
        $data_kegiatan = Kegiatan::all();
        return view('admins.detail_kegiatan', compact('data_kegiatan'));
    }

    public function updateStatus()
    {
        $kegiatans=Kegiatan::all();
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("Y-m-d");
        

        foreach ($kegiatans as $kegiatan)
        {
            
            if($kegiatan->tanggal_mulai == $dateNow)
            {
                $jamAwal = $kegiatan->jam_mulai;
                $jamAkhir = $kegiatan->jam_selesai;
                $currentTime = time();

                if ($kegiatan->status != 2)
                {
                    if(date('H:i',$currentTime)>=$jamAwal and date('H:i',$currentTime)<= $jamAkhir)
                        $kegiatan->status=0;
                    else
                        $kegiatan->status=1;
                }

                $kegiatan->save();
            }
            else
            {
                $kegiatan->status = 1;
                $kegiatan->save();
            }
        }
    }

    public function updateStatusByButton($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();

        if ($kegiatan->status == 1) { $kegiatan->status = 0; }
        else if ($kegiatan->status == 0) { $kegiatan->status = 2; }
        else if ($kegiatan->status == 2) { $kegiatan->status = 0; }

        $kegiatan->save();

        return redirect()->route('absen_per_kegiatan', $id);
    }

    public function showAllKegiatan()
    {
        // $kegiatan=Kegiatan::all();
        $this->updateStatus();
        $kegiatan=Kegiatan::orderBy('status', 'ASC')
            ->orderBy('tanggal_mulai', 'ASC')->orderBy('jam_mulai', 'ASC')->get();
        $output = "";
        $output .="
        <table id='logTable' class='table table-hover py-3 w-100 text-center mt-5'>
            <thead>
                <tr>
                    <th style='text-align: center;'>Nama</th>
                    <th style='text-align: center;'>Tempat</th>
                    <th style='text-align: center;'>Tanggal</th>
                    <th style='text-align: center;'>Waktu</th>
                    <th style='text-align: center;'>Status</th>
                    <th style='text-align: center;'>Dibuat Oleh</th>
                    <th style='text-align: center;'>Presensi</th>
                </tr>
            </thead>

            <tbody>
        ";
        
        foreach($kegiatan as $kegiatans)
        {
            $url = url("/kelola-kegiatan/absen/".$kegiatans->id);
            $url_edit = url("/kelola-kegiatan/edit-kegiatan/".$kegiatans->id);
            $url_delete = url("/kelola-kegiatan/kegiatan/delete/".$kegiatans->id);

            $ahref = '<a href="'.$url.'"><button type="button" class="btn btn-outline-dark"><i class="fa fa-search" aria-hidden="true"></i></button></a>';
            $ahref_edit = '<a href="'.$url_edit.'"><button type="button" class="btn btn-outline-dark"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';
            $ahref_delete = '<a href="'.$url_delete.'"><button type="button" class="btn btn-outline-dark"><i class="fa fa-trash" aria-hidden="true"></i></button></a>';
            
            if ($kegiatans->status == 0)
                $status = "Berlangsung";
            else
                $status = "Tidak Berlangsung";
                // <tr id="absen" onclick="getAbsen(`'.$kegiatans->id.'`)">
            
            $output.='<tr>
                <td style="text-align: left;">'.$kegiatans->nama.'</td>
                <td style="text-align: left;">'.$kegiatans->tempat.'</td>
                <td style="text-align: left;">'.Carbon::createFromFormat('Y-m-d', $kegiatans->tanggal_mulai)->format('d-m-Y').'</td>
                <td style="text-align: left;">'.$kegiatans->jam_mulai.' - '.$kegiatans->jam_selesai.'</td>
                <td style="text-align: left;">'.$status.' </td>
                <td style="text-align: left;">'.$kegiatans->created_by.' </td>
                <td>
                '.$ahref_edit.'
                '.$ahref.'
                </td>
            </tr>';
        }
        $output .= '</tbody>
        </table>';
        return response()->json($output);
        // return "k";
    }

    public function showLastVisit()
    {
        $jemaat = UserJamaat::orderBy('last_visit', 'DESC')->get();
        $output = "";
        $output .="
        <table id='logTable2' class='table table-hover py-3 w-100 text-center mt-5'>
            <thead>
                <tr>
                    <th style='text-align: center; width: 12%;'>ID Umat</th>
                    <th style='text-align: center; width: 30%;'>Nama</th>
                    <th style='text-align: center; width: 40%;'>Alamat</th>
                    <th style='text-align: center; width: 18%;'>Kunjungan Terakhir</th>
                </tr>
            </thead>

            <tbody>
        ";

        foreach($jemaat as $jemaats)
        {
            $output.='<tr>
                <td style="text-align: left;">'.$jemaats->id_code.'</td>
                <td style="text-align: left;">'.$jemaats->name.'</td>
                <td style="text-align: left;">'.$jemaats->alamat.'</td>';
            
            // <td style="text-align: left;">'.Carbon::createFromFormat('Y-m-d', $jemaats->tanggal_lahir)->format('d-m-Y').'</td>
            
            if ($jemaats->last_visit == NULL)
            {
                $output.='<td style="text-align: left;">'.$jemaats->last_visit.'</td>';
            }
            else 
            {
                $output.='<td style="text-align: left;">'.Carbon::createFromFormat('Y-m-d', $jemaats->last_visit)->format('d-m-Y').'</td>';
            }

            $output.='</tr>';
        }
        $output .= '</tbody>
        </table>';
        return response()->json($output);
    }

    // public function goToAbsenPage(Request $request)
    // {
    //     $id=$request->id;
    //     // return redirect()->route('addJadwal_kegiatan');
    //     return view('admins.kelola_absen');
    //     // return 1;
    // }

    public function getKegiatanbyId(Request $request)
    {
        $kegiatan=Kegiatan::find($request->id);
        $jemaats = userJamaat::all();
        $message = "";
        foreach ($jemaats as $jemaat) {
            $message .= '<option value="'.$jemaat->id_code.'">'.$jemaat->name.' - '.$jemaat->alamat.' - '.$jemaat->tanggal_lahir. ' - ' . $jemaat->no_handphone_1;
        }
        // $temp=array();
        // $temp.push()
        // return response()->json($message);
        
        
        $idkegiatan=absensiJamaat::where('idkegiatan',$request->id)->get();

        $output = "";
        $output .="
        <table id='logTable' class='table py-3 w-100 text-center mt-5'>
            <thead>
                <tr>
                    <th style='text-align: center;'>Nama</th>
                    <th style='text-align: center;'>Tempat tinggal</th>
                    <th style='text-align: center;'>Tanggal lahir</th>
                </tr>
            </thead>

            <tbody>
        ";

        // $userr=userJamaat::where('id',1)->();
        
        $temp = "";
        foreach($idkegiatan as $data)
        {
            $user=userJamaat::where('id_code',$data->idjamaat)->first();
            $output.='<tr>
                <td style="text-align: left;">'.$user->name.'</td>
                <td style="text-align: left;">'.$user->alamat.'</td>
                <td style="text-align: left;">'.Carbon::createFromFormat('Y-m-d', $user->tanggal_lahir)->format('d-m-Y').'</td>
            </tr>';
            // $temp.=$data->id."  ";
        }
        $output .= '</tbody>
        </table>';
        // return response()->json($output);
        
        $photo_link = $kegiatan->foto_kegiatan;
        
        return ["message"=>$message,"kegiatan"=>$kegiatan->nama,
        "table"=>$output, "photo_link"=>$photo_link, "status_kegiatan"=>$kegiatan->status];
    }

    public function getStatusKegiatan(Request $request)
    {
        $kegiatan=Kegiatan::find($request->id);

        // $data = "";
        // date_default_timezone_set('Asia/Jakarta');
        // $dateNow = date("Y-m-d");

        // if($kegiatan->tanggal_mulai == $dateNow)
        // {
        //     $jamAwal = $kegiatan->jam_mulai;
        //     $jamAkhir = $kegiatan->jam_selesai;

        //     $currentTime = time();
            
        //     if(date('H:i',$currentTime) >= $jamAwal and date('H:i',$currentTime) <= $jamAkhir)
        //         $data =1;
        //     else
        //         $data =0;
        // }
        // else 
        //     $data= 0;

        
        return $kegiatan->status;

    }

    public function getQR(Request $request)
    {
        if(UserJamaat::where('id_code', '=', $request->idJemaat)->exists())
        {
            // dd('1asfsfsaf');
            $qrCode =  \SimpleSoftwareIO\QrCode\Facades\QrCode:: size(150)->generate($request->idJemaat);
            return $qrCode;
        }
        else
            return 404;
    }
    
    public function getBarcode(Request $request)
    {
        if(UserJamaat::where('id_code', '=', $request->idJemaat)->exists())
        {
            $d = new DNS1D();
            $barCode =  $d->getBarcodeHTML($request->idJemaat, 'C128');
            return $barCode;
        }
        else
            return 404;
    }

    function getAbsen(Request $absen)
    {
        $idkegiatan=absensiJamaat::where('idkegiatan',$absen->id)->get();

        $output = "";
        $output .="
        <table id='logTable' class='table py-3 w-100 text-center mt-5'>
            <thead>
                <tr>
                    <th style='text-align: center;'>Nama</th>
                    <th style='text-align: center;'>Tempat tinggal</th>
                    <th style='text-align: center;'>Tanggal lahir</th>
                </tr>
            </thead>

            <tbody>
        ";


        foreach($idkegiatan as $data)
        {
            $user=userJamaat::where('id_code',$data->idjamaat);
            $output.='<tr>
                <td style="text-align: left;">'.$user->name.'</td>
                <td style="text-align: left;">'.$user->alamat.'</td>
                <td style="text-align: left;">'.$user->tanggal_lahir.'</td>
            </tr>';
        }
        $output .= '</tbody>
        </table>';
        return response()->json($output);
    }

    public function addAbsensiKegiatan(Request $request)
    {
        $data=[
            'idjamaat'=>$request->idJemaat,
            'idkegiatan'=>$request->idKegiatan,
        ];

        $checkUser = UserJamaat::where('id_code',$request->idJemaat)->get()->count()>0;
        // return $checkUser;
        if($checkUser)
        {
            $idkegiatan = absensiJamaat::where('idkegiatan',$request->idKegiatan)->where('idjamaat',$request->idJemaat)->get()->count() > 0;
            // return $idkegiatan;
            // $jemaatnya = UserJamaat::find(1);
            $jemaatnya = UserJamaat::where('id_code','=',$request->idJemaat)->first();
            // return $jemaatnya->id_code;
            if(!$idkegiatan)
            {
                $this->AbsensiJemaat->addDataAbsensiJamaat($data);
                $jemaatnya->last_visit = date("Y-m-d");
                $jemaatnya->save();
                return 200;
            }
            else{
                return 202;
            }
        }
        else
            return 404;


    }
}
