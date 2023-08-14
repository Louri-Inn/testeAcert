<?php

use App\Http\Controllers\atividade2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\atividade3Controller;
use Illuminate\Http\Request;

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
    return view('teste');
});

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/louri', [testeController::class, 'louri']);

Route::get('/atividade3', [atividade3Controller::class, 'atividade3']);

Route::get('/buscaendereco', [atividade3Controller::class, 'buscaEndereco']);

Route::post('/consultacep', [atividade3Controller::class, 'consultaCep']);

Route::get('/atividade2', [atividade2Controller::class, 'atividade2']);

Route::get('/consultausuario/{id}', [atividade2Controller::class, 'consultaUsuario']);


