<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    function searchLowonganMain(Request $req){
        $jabatan = $req->jabatan;
        $wilayah = $req->jenis_wilayah . ' ' . $req->nama_wilayah;
        $data = Lowongan::query();
        
        $data = $data->where('jabatan', 'ILIKE', '%'.$jabatan.'%')
                    ->andWhere('kota', 'ILIKE', '%'.$wilayah.'%')
                    ->get();

        return $data;
    }

    public function addLowongan(Request $req) {
        if(session('role') == 'Perusahaan') {
            $data = new Lowongan();

            $data->id_perusahaan = session('user')->id;
            $data->jabatan = $req->jabatan;
            $kota = $req->jenis_wilayah . ' ' . $req->nama_wilayah;
            $data->kota = $kota;
            $data->alamat = $req->alamat;
            $data->durasi = $req->durasi;
            $data->deskripsi = $req->deskripsi;
            $data->gaji = $req->gaji;
            $data->save();
            return redirect('/profile#lowongan')->with('uploaded', 'Berhasil upload lowongan');
        } else {
            return view('/errors/404');
        }
    }

    public function updateLowongan(Request $req, $id) {
        if(session('role') == 'Perusahaan') {
            $data = Lowongan::find($id);

            $data->id_perusahaan = session('user')->id;
            $data->jabatan = $req->jabatan;
            $kota = $req->jenis_wilayah . ' ' . $req->nama_wilayah;
            $data->kota = $kota;
            $data->alamat = $req->alamat;
            $data->durasi = $req->durasi;
            $data->deskripsi = $req->deskripsi;
            $data->gaji = $req->gaji;
            $data->update();
            return redirect('/profile#lowongan')->with('updated', 'Berhasil update lowongan');
        } else {
            return view('/errors/404');
        }
    }

    public function deleteLowongan(Request $req, $id) {
        if(session('role') == 'Perusahaan') {
            $data = Lowongan::find($id);
            $data->delete();

            return redirect('/profile#lowongan')->with('deleted', 'Berhasil delete lowongan');
        } else {
            return view('/errors/404');
        }
    }
}
