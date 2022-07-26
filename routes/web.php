<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ScanController;
use App\Http\Controllers\m_battsController;


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
    return view('home',["title" => "Home"]);
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


Route::get('/batt_show', [m_battsController::class, 'show_batt']);

Route::get('/posts', [PostController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('scan/{cell_sern_scan}/{v_gr_scan}/{ir_gr_scan}', [m_battsController::class, 'scan_now']);
// Route::get('/scan', function () {
//     return view('scan' ,
//     [
//         "kode" => "KD001",
//         "title" => "Scan",
//         "c_po"=>"298,2135"
//     ]);
// });

Route::put('/update_data/{cell_sern_scan}', [m_battsController::class, 'update']);
// Route::put('/update_data/{cell_sern_scan}', function () {
//    echo 'tEEST';
// });