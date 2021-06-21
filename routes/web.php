<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
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
        $perusahaan = App\Models\Perusahaan::orderBy('id', 'asc')
                                    ->get();
        $pelamar = App\Models\User::orderBy('id', 'asc')
                                    ->get();
                                    
        $profile = null;
        if(session('role') == 'Perusahaan') {
            $profile = App\Models\Perusahaan::findOrFail($id);
        }
        elseif(session('role') == 'Pelamar') {
            $profile = App\Models\User::findOrFail($id);
        }
        else {
            return redirect('/');
        }
        return view('profile')
                ->with(['profile' => $profile])
                ->with(['lamaran' => $lamaran])
                ->with(['lowongan' => $lowongan])
                ->with(['perusahaan' => $perusahaan])
                ->with(['pelamar' => $pelamar]);
    } else {
        return redirect('/');
    }
});

Route::get('/list-lowongan', function() {
    $lowongan = App\Models\Lowongan::orderBy('id', 'asc')
                                ->get();
    $perusahaan = App\Models\Perusahaan::orderBy('id', 'asc')
                                ->get();
    return view('list-lowongan')
        ->with(['lowongan' => $lowongan])
        ->with(['perusahaan' => $perusahaan]);
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

Route::post('/addLamaran',[LamaranController::class,'addLamaran']);
Route::get('/downloadCv/{id}',[LamaranController::class,'downloadCv']);
Route::post('/confirmLamaran/{id}',[LamaranController::class,'confirmLamaran']);
Route::post('/declineLamaran/{id}',[LamaranController::class,'declineLamaran']);
Route::post('/updateLamaran/{id}',[LamaranController::class,'updateLamaran']);
Route::delete('/deleteLamaran/{id}',[LamaranController::class,'deleteLamaran']);