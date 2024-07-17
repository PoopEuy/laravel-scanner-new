<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ScanController;
use App\Http\Controllers\M_battController;
use App\Http\Controllers\M_typeController;
use App\Http\Controllers\M_binController;
use App\Http\Controllers\T_FrameController;
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
        "title" => "FRAME TALIS 30"
    ]);
});
Route::get('/getBattData/{batt_qr_code}', [M_battController::class, 'getBattData']);
Route::get('/getFrameData/{frameValue}', [M_battController::class, 'getFrameData']);
Route::post('/getBattByPo', [M_battController::class, 'getBattByPo']);

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

Route::get('/frameScan4', function () {
    return view('frameScan4' ,
    [
        "title" => "FRAME TALIS 5"
    ]);
});

Route::get('/frameScan4v2', function () {
    return view('frameScan4V2' ,
    [
        "title" => "FRAME TALIS 5"
    ]);
});

Route::get('/frameScan5', function () {
    return view('frameScan5' ,
    [
        "title" => "FRAME TALIS 7"
    ]);
});

Route::get('/frameScan6', function () {
    return view('frameScan6' ,
    [
        "title" => "Frame Scan6"
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
Route::get('/battInfo', [M_typeController::class, 'battInfo']);
Route::get('/typeSetting', function () {
    return view('typeSetting' ,
    [
        "title" => "typeSetting"
    ]);
});

//T_Frame
Route::get('/getFrameList', [T_FrameController::class, 'getFrame']);
Route::get('/getFramesBySN/{frame_sn}', [T_FrameController::class, 'getFramesBySN']);
Route::post('/createFrame', [T_FrameController::class, 'createFrame']);
Route::post('/createBulkFrame', [T_FrameController::class, 'createBulkFrame']);

// Route to retrieve CSRF token
// Route::get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });




