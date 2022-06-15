<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolyController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'acceuil']);
Route::get('/pass/{id}', [HomeController::class, 'verifypass'])->name('verify.pass');



Route::group(['middleware' => ['auth:poly']], function () {
    Route::get('poly/dashboard', [PolyController::class, 'dashboard'])->name('poly.dashboard');
    Route::get('poly/profile', [PolyController::class, 'profile'])->name('poly.profile');
    Route::post('poly/profile', [PolyController::class, 'updateProfile'])->name('poly.post.profile');
    Route::get('poly/rdv', [PolyController::class, 'mesRdv'])->name('poly.rdv');
    Route::get('poly/adduser', [PolyController::class, 'Adduserform'])->name('poly.adduserform');
    Route::post('poly/adduser', [PolyController::class, 'adduser'])->name('poly.adduser');
    Route::get('poly/rvd/signaler/{id}', [PolyController::class, 'signaler'])->name('poly.signaler');
    Route::get('poly/rvd/confirmer/{id}', [PolyController::class, 'confirmer'])->name('poly.confirmer');
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/search', [UserController::class, 'home'])->name('home');
    Route::get('/rdvs', [UserController::class, 'rdvs'])->name('rdvs');
    Route::post('/vaccin/polycliniques', [UserController::class, 'polycliniques'])->name('polycliniques');
    Route::get('/polycliniques/{polyclinique_id}/vaccin/{vaccin_id}/reservation', [UserController::class, 'reservation'])->name('reservation');
    Route::post('/polycliniques/reserver', [UserController::class, 'reserver'])->name('reserver');
    Route::post('/rvd/{rdv_id}/expand', [UserController::class, 'expand'])->name('expand'); 
});


require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
