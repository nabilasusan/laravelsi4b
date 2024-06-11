<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Models\Prodi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return "halaman about";
});

Route::get('profil',function () {
    return view('profil');
});

// route dengan parameter
Route::get('welcome/{salam}', function($salam) {
    // return 'selamat '. $salam;
    return view('salam')->with('viewsalam', $salam);
});

// Route tanpa parameter listdata
// terdapat arrray list
Route::get('listdata', function() {
    $list = ["sistem informasi","informatika","manajemen"];
    $listmhs = [
        ["npm" => 001, "nama" => "eric"],
        ["npm" => 002, "nama" => "nabila"],
    ];
    return view('listprodi')->with('viewlist', $list)->with('viewmhs', $listmhs);
});

Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
// Route::get('dashboard',[DashboardController::class,'index']);