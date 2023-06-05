<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailKirimIuran;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function index($nama, $email, $nominal_tagihan, $bulan_tagihan)
    {
        $bulan_tagihan = date('M, Y', strtotime($bulan_tagihan));
        $var = number_format($nominal_tagihan, 0, '.', ',');
        $details = [
            'title' => 'Tagihan Iuran Wajib',
            'body' => "Berikut adalah Total tagihan iuran wajib
            untuk Bpk/Ibu {$nama} untuk bulan {$bulan_tagihan} :",
            'nominal' => "Sebesar : " . "Rp.{$var}"
        ];

        Mail::to($email)->send(new \App\Mail\EmailKirimIuran($details));

        $pesan = "Success";
        return response()->json([
            'pesan' => $pesan
        ]);
    }
}
