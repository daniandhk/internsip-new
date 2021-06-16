<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LowonganController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $count_lowongan = DB::table('lowongan')
                        ->count();
    $count_perusahaan = DB::table('perusahaan')
                        ->count();
    return view('home')
                ->with(['count_lowongan' => $count_lowongan])
                ->with(['count_perusahaan' => $count_perusahaan]);
});

Route::get('/profile', function () {
    if(session('status') == 'LOGGED_IN'){
        $id = session('user')->id;
        $lowongan = App\Models\Lowongan::orderBy('id', 'asc')
                                    ->get();
        $lamaran = App\Models\Lamaran::orderBy('id', 'asc')
                                    ->get();
        if(session('role') == 'Admin') {
            // $data = App\Models\Admin::findOrFail($id);
            // return view('profile')
            //     ->with(['data' => $data]);
            return redirect('/');
        }
        elseif(session('role') == 'Perusahaan') {
            $data = App\Models\Perusahaan::findOrFail($id);
            return view('profile')
                ->with(['data' => $data])
                ->with(['lamaran' => $lamaran])
                ->with(['lowongan' => $lowongan]);
        }
        elseif(session('role') == 'User') {
            $data = App\Models\User::findOrFail($id);
            return view('profile')
                ->with(['data' => $data])
                ->with(['lamaran' => $lamaran]);
        }
        else {
            return redirect('/');
        }
    } else {
        return redirect('/');
    }
});

Route::get('/list-lowongan', function() {
    $datas = App\Models\Lowongan::orderBy('id', 'asc')
                                ->get();
    return view('list-lowongan')
        ->with(['datas' => $datas]);
});

Route::get('/list-perusahaan', function () {
    return view('list-perusahaan');
});

Route::get('/logout', function () {
    if(session()->has('status')) {
        session()->flush();
    }
    return redirect('/');
});

Route::get('/login', function () {
    if(session('status') == 'LOGGED_IN')  {
        return redirect('/');
    } else {
        return view('login');
    }
});
Route::post('userLoginForm',[UserController::class,'loginUser']);

Route::get('/register-user', function() {
    if(session('status') == 'LOGGED_IN')  {
        return redirect('/');
    } else {
        return view('register-user');
    }
});
Route::post('userRegisterForm',[UserController::class,'registerUser']);

Route::get('/register-perusahaan', function() {
    if(session('status') == 'LOGGED_IN')  {
        return redirect('/');
    } else {
        return view('register-perusahaan');
    }
});
Route::post('perusahaanRegisterForm',[UserController::class,'registerPerusahaan']);

Route::post('/updateProfile/{id}',[UserController::class,'updateProfile']);
Route::post('/addLowongan',[LowonganController::class,'addLowongan']);
Route::post('/updateLowongan/{id}',[LowonganController::class,'updateLowongan']);
Route::delete('/deleteLowongan/{id}',[LowonganController::class,'deleteLowongan']);