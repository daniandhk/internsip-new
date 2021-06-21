<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use File;

class LamaranController extends Controller
{
    public function addLamaran(Request $req) {
        if(session('role') == 'Pelamar') {
            $lamaran = Lamaran::orderBy('id', 'asc')
                                    ->where('id_lowongan', $req->id_lowongan)
                                    ->where('id_perusahaan', $req->id_perusahaan)
                                    ->where('id_pelamar', session('user')->id)
                                    ->first();
            
            if($lamaran == null){
                $data = new Lamaran();

                if($req->hasFile('cv_file')) {
                    $data->id_lowongan = $req->id_lowongan;
                    $data->id_perusahaan = $req->id_perusahaan;
                    $data->id_pelamar = session('user')->id;
                    $data->status = "Verifying";

                    $cv = $req->file('cv_file');
                    $cvName = $data->id_lowongan.$data->id_perusahaan.$data->id_pelamar.'_'.$cv->getClientOriginalName();
                    $destPath = public_path('/files/CV');
                    $cv->move($destPath, $cvName);

                    $data->cvName = $cvName;
                    $data->save();
                    return redirect('/list-lowongan')->with('uploaded', 'Berhasil upload lamaran');
                } 
                else {
                    return redirect('/list-lowongan')->with('file_null', 'Pilih file dengan benar');
                }
            }
            else {
                return redirect('/list-lowongan')->with('duplicated', 'Anda sudah pernah submit');
            }
        } 
        else {
            return redirect('/list-lowongan')->with('error', 'Wrong role');
        }
    }

    public function updateLamaran(Request $req, $id) {
        if(session('role') == 'Pelamar') {
            $data = Lamaran::find($id);

            if($req->hasFile('cv_file')) {
                if($data->cvName != null){
                    $temp = public_path("files/CV/{$data->cvName}"); // get previous image from folder
                    if (File::exists($temp)) { // unlink or remove previous image from folder
                        unlink($temp);
                    }
                }
                $cv = $req->file('cv_file');
                $cvName = $data->id_lowongan.$data->id_perusahaan.$data->id_pelamar.'_'.$cv->getClientOriginalName();
                $destPath = public_path('/files/CV');
                $cv->move($destPath, $cvName);
                $data->cvName = $cvName;
            }
            $data->update();
            return redirect('/profile#lamaran')->with('updated', 'Berhasil update lamaran');
        } else {
            return redirect('/list-lowongan')->with('error', 'Wrong role');
        }
    }

    public function deleteLamaran(Request $req, $id) {
        if(session('role') == 'Pelamar') {
            $data = Lamaran::find($id);
            
            if($data->cvName != null){
                $temp = public_path("files/CV/{$data->cvName}"); // get previous image from folder
                if (File::exists($temp)) { // unlink or remove previous image from folder
                    unlink($temp);
                }
            }
            $data->delete();

            return redirect('/profile#lamaran')->with('deleted', 'Berhasil delete lamaran');
        } else {
            return redirect('/list-lowongan')->with('error', 'Wrong role');
        }
    }

    public function downloadCv(Request $req, $id) {
        $data = Lamaran::find($id);

        return response()->download(public_path('files/CV/' . $data->cvName));
    }

    public function confirmLamaran(Request $req, $id) {
        if(session('role') == 'Perusahaan') {
            $data = Lamaran::find($id);

            $data->status = "Confirmed";
            $data->save();
            return redirect('/profile#lamaran')->with('updated', 'Berhasil update lamaran');
        } else {
            return redirect('/list-lowongan')->with('error', 'Wrong role');
        }
    }

    public function declineLamaran(Request $req, $id) {
        if(session('role') == 'Perusahaan') {
            $data = Lamaran::find($id);

            $data->status = "Declined";
            $data->save();
            return redirect('/profile#lamaran')->with('updated', 'Berhasil update lamaran');
        } else {
            return redirect('/list-lowongan')->with('error', 'Wrong role');
        }
    }
}
