<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ScanController;
use App\Http\Controllers\M_battController;
use App\Http\Controllers\M_typeController;
use App\Http\Controllers\M_binController;
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
    return view('home',["title" => "Home","image" => "Sundaya_Logo.png"]);
});

Route::get('/upload_data', function () {
    return view('upload',["title" => "Upload"]);
});
// Route::get('/upload_aksi', function () {
//     return view('upload_aksi',["title" => "Upload"]);
// });

Route::get('/about', function () {
    return view('about' ,
    [
        "title" => "About",
        "name" => "Kemal",
        "email" => "koala.gmail.com",
        "image" => "koala.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/batt_show', [M_battController::class, 'batt_show']);

// Route::get('/scan', function () {
//     return view('scan' ,
//     [
//         "kode" => "KD001",
//         "title" => "Scan",
//         "c_po"=>"298,2135"
//     ]);
// });

//mbatt Route
Route::get('scan/{cell_sern_scan}/{v_gr_scan}/{ir_gr_scan}', [M_battController::class, 'scan_now']);

Route::get('/m_battsexport', [M_battController::class, 'm_battexport']);
Route::put('/update_data/{cell_sern_scan}', [M_battController::class, 'update']);
Route::post('/m_battimportexcel', [M_battController::class, 'm_battimportexcel']);
Route::get('/findQr', function () {
    return view('findQr',["title" => "Find BINQR"]);
});
Route::get('/scanIrVolt/{v_gr_scan}/{ir_gr_scan}', [M_battController::class, 'scanIrVolt']);
Route::post('/vendorVoltIr', [M_battController::class, 'vendorVoltIr']);
Route::post('/findQrCode', [M_battController::class, 'findQrCode']);
Route::get('/searchBinPage', [M_battController::class, 'searchBinPage']);
Route::get('/searchBinData/{cell_sern_scan}', [M_battController::class, 'searchBinData']);
Route::get('/voltageUpdate', [M_battController::class, 'voltageUpdate']);

Route::post('/saveFrameData/{counter}', [M_battController::class, 'saveFrameData']);

Route::get('/input_test', function () {
    return view('input_test',["title" => "InputTest"]);
});

Route::get('/frameScan', function () {
    return view('frameScan' ,
    [
        "title" => "Frame Scan"
    ]);
});
Route::get('/getBattData/{batt_qr_code}', [M_battController::class, 'getBattData']);
Route::get('/getFrameData/{frameValue}', [M_battController::class, 'getFrameData']);

Route::get('/frameScan2', function () {
    return view('frameScan2' ,
    [
        "title" => "Frame Scan2"
    ]);
});


Route::get('/frameScan3', function () {
    return view('frameScan3' ,
    [
        "title" => "Frame Scan3"
    ]);
});


Route::get('/frameScan_bp', function () {
    return view('frameScan_bp' ,
    [
        "title" => "Frame Scan_bp"
    ]);
});

Route::get('/importDataPage', [M_typeController::class, 'importDataPage']);
Route::get('/get_po_type', [M_typeController::class, 'get_po_type']);
Route::post('/createMtype', [M_typeController::class, 'createMtype']);

Route::get('/getBinByPo', [M_binController::class, 'getBinByPo']);
Route::get('/getBinMaster', [M_binController::class, 'getBinMaster']);
Route::post('/createMbin', [M_binController::class, 'createMbin']);

// Route::get('/binSetting', function () {
//     return view('binSetting' ,
//     [
//         "title" => "binSetting"
//     ]);
// });
Route::get('/binSetting', [M_typeController::class, 'selectType']);

Route::get('/typeSetting', function () {
    return view('typeSetting' ,
    [
        "title" => "typeSetting"
    ]);
});