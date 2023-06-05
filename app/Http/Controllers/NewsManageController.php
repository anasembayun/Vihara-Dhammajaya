<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;

class NewsManageController extends Controller
{
    public function __construct()
    {
        $this->News = new News();
        $this->middleware('auth');
    }

    public function viewAddNews()
    {
        $users = User::all();
        return view('admins.manage_news.add_news', compact('users'));
    }

    public function viewDataNews()
    {
        $beritas = News::all();
        return view('admins.manage_news.list_news', compact('beritas'));
    }

    public function viewDetailDataNews($id)
    {
        $berita = News::where('id', $id)->first();
        return view('admins.manage_news.edit_data_news', compact('berita'));
    }

    public function addNews()
    {
        Request()->validate([
            'nama_penulis' => 'required',
            'tanggal_berita_dibuat' => 'required',
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita',
        ]);

        $filename = "";
        if (Request()->hasFile('foto_berita')) {
            if (Request()->file('foto_berita')) {
                $file = Request()->file('foto_berita');
                $filename = date('YmdHi').'_'.$file->getClientOriginalName();
                $file->move(public_path('images/app_admin/kelola_berita/foto_berita'), $filename);
            }
        }

        $data = [
            'nama_penulis' => Request()->nama_penulis,
            'tanggal_berita_dibuat' => Request()->tanggal_berita_dibuat,
            'judul_berita' => Request()->judul_berita,
            'isi_berita' => Request()->isi_berita,
            'foto_berita' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->News->addDataNews($data);
        return redirect()->route('tambah_berita')->with('success','Berita '.Request()->judul_berita.' berhasil ditambahkan!');
    }

    public function updateNews($id)
    {
        Request()->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita',
        ]);

        if (Request()->foto_berita <> "")
        {
            $news = $this->News->detailDataNews($id);
            if ($news->foto_berita <> "")
            {
                unlink(public_path('images/app_admin/kelola_berita/foto_berita').'/'.$news->foto_berita);
            }

            $file = Request()->file('foto_berita');
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('images/app_admin/kelola_berita/foto_berita'), $filename);

            $data = [
                'judul_berita' => Request()->judul_berita,
                'isi_berita' => Request()->isi_berita,
                'foto_berita' => $filename,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $data = [
                'judul_berita' => Request()->judul_berita,
                'isi_berita' => Request()->isi_berita,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->News->editDataNews($id, $data);
        return redirect()->route('detail_data_berita', $id)->with('success','Berita '.Request()->judul_berita.' berhasil diperbarui!');
    }

    public function deleteNews($id)
    {
        $news = $this->News->detailDataNews($id);
        if ($news->foto_berita <> "")
        {
            unlink(public_path('images/app_admin/kelola_berita/foto_berita').'/'.$news->foto_berita);
        }

        $this->News->deleteDataNews($id);
        return redirect()->route('daftar_berita');
    }
}
