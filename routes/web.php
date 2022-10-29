<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [BasicController::class, "home"])->name("home");

Route::prefix("book")->group(function(){
    Route::get("/", [BookController::class, "index"])->name("indexBook");
    Route::get("/all", [BookController::class, "getAll"])->name("getAllBooks")->middleware("ensurePageIsSuperiorToZero");
    Route::get("/create", [BookController::class, "create"])->name("createBook");
    Route::post("/store", [BookController::class, "store"])->name("storeBook");
});


// Route::get('/', function () {
//     // $uuid = Str::uuid();
//     // DB::insert("INSERT INTO edition(name) VALUES(?)",[$uuid]);
//     // $lastinsert = DB::select("SELECT LAST_INSERT_ID();");
//     // $connectionid = DB::select("select connection_id()");
//     // print_r($connectionid);
//     // echo "<br>";
//     // print_r($lastinsert);
    
//     return view('basic.home', [
//         "connectionid" => "bite"
//     ]);
// });
