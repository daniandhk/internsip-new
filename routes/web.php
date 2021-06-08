<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
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
