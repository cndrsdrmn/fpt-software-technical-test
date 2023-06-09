<?php

use App\Http\Controllers\API\V1\CustomerController;
use App\Support\FptHelper;
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

Route::prefix('v1')->group(function () {
    Route::get('alphabet', function (Request $request) {
        $char = $request->get('q', 'ftpsoftware');

        return response()->json([
            'alphabet' => FptHelper::alphabetSoup($char),
        ]);
    })->name('alphabet');

    Route::apiResource('customers', CustomerController::class);
});