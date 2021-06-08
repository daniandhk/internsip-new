<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Perusahaan;

class UserController extends Controller
{
    function loginUser(Request $req) {
        $data = $req->input();
        if($data['role'] == "User"){
            $result = DB::table('users')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->count();
            if($result > 0) {
                $data_user = DB::table('users')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->first();
                $req->session()->put('user', $data_user);
                $req->session()->put('status', 'LOGGED_IN');
                $req->session()->put('role', 'User');
                $req->session()->put('token', $data['_token']);
                return redirect('/');
            } else {
                return redirect('/login')->with(['failed' => 'Email atau password salah']);
            }
        }
        elseif($data['role'] == "Perusahaan"){
            $result = DB::table('perusahaan')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->count();
            if($result > 0) {
                $data_user = DB::table('perusahaan')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->first();
                $req->session()->put('user', $data_user);
                $req->session()->put('status', 'LOGGED_IN');
                $req->session()->put('role', 'Perusahaan');
                $req->session()->put('token', $data['_token']);
                return redirect('/');
            } else {
                return redirect('/login')->with(['failed' => 'Email atau password salah']);
            }
        }
        elseif($data['role'] == "Admin"){
            $result = DB::table('admin')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->count();
            if($result > 0) {
                $data_user = DB::table('perusahaan')->where('email', $data['email'])
                                        ->where('password', md5($data['password']))
                                        ->first();
                $req->session()->put('user', $data_user);
                $req->session()->put('status', 'LOGGED_IN');
                $req->session()->put('role', 'Admin');
                $req->session()->put('token', $data['_token']);
                return redirect('/');
            } else {
                return redirect('/login')->with(['failed' => 'Email atau password salah']);
            }
        }
    }

    function registerUser(Request $req) {
        $validate = $req->validate([
            'nama' => 'required|present',
            'ttl' => 'required|present',
            'telepon' => 'required|present',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|present',
            'validation' => 'required_with:password|same:password|present',
        ]);

        $data = new User();
        $data->nama = $req->nama;
        $data->ttl = $req->ttl;
        $data->telepon = $req->telepon;
        $data->email = $req->email;
        $data->password = md5($req->password);
        $data->imageName = "";
        $data->save();
        return redirect('/login')->with('success', 'Your account has been successfully created!');
    }

    function registerPerusahaan(Request $req) {
        $validate = $req->validate([
            'nama' => 'required|present',
            'lokasi' => 'required|present',
            'deskripsi' => 'required|present',
            'telepon' => 'required|present',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|present',
            'validation' => 'required_with:password|same:password|present',
        ]);

        $data = new Perusahaan();
        $data->nama = $req->nama;
        $data->lokasi = $req->lokasi;
        $data->deskripsi = $req->deskripsi;
        $data->telepon = $req->telepon;
        $data->email = $req->email;
        $data->password = md5($req->password);
        $data->imageName = "";
        $data->save();
        return redirect('/login')->with('success', 'Your account has been successfully created!');
    }
}
