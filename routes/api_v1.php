<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GraphController;
use App\Http\Controllers\Api\V1\NodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('graphs/{graph}/addNode', [GraphController::class, 'addNode'])->name('graph.addNode');
Route::post('graphs/{graph}/addRelation', [GraphController::class, 'addRelation'])->name('graph.addRelation');
//Route::get('/graphs/{graph}/all', [GraphController::class, 'all']);
Route::apiResource('graphs', GraphController::class);

Route::delete('nodes/{node}', [NodeController::class, 'destroy'])->name('node.destroy');
