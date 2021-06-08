<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    fuction searchLowonganMain(Request $req){
        $jabatan = $req->jabatan;
        $wilayah = $req->jenis_wilayah . ' ' . $req->nama_wilayah;
        $data = Lowongan::query();
        
        $data = $data->where('jabatan', 'ILIKE', '%'.$jabatan.'%')
                    ->andWhere('kota', 'ILIKE', '%'.$wilayah.'%')
                    ->get();

        return $data;
    }
}
