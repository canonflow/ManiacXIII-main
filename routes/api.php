<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Si;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/{player}/detail', [Si\SiController::class, 'playerDetail'])
    ->name('player.detail');
Route::post('/{player}/attack', [Si\SiController::class, 'attack']);
Route::post('/{player}/power-skill', [Si\SiController::class, 'powerSkillAttack']);
Route::post('/{player}/ultimate', [Si\SiController::class, 'ultimateAttack']);
Route::post('/{player}/buy/potion', [Si\SiController::class, 'buyPotion']);
Route::post('/{player}/buy/dragon-breath', [Si\SiController::class, 'buyDragonBreath']);
Route::post('/{player}/buy/backpack', [Si\SiController::class, 'buyBackpack']);
Route::post('/{player}/buy/restore', [Si\SiController::class, 'buyRestore']);
