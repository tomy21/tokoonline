<?php

use App\Http\Controllers\api\v1\MResiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function(){
    Route::apiResource('/resi', MResiController::class);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
