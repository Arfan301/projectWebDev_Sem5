<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;


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

Route::post('/reserve', function (Request $request) {
    // Validate input data
    $data = $request->validate([
        'Name' => 'required|string|max:255',
        'No_Telp' => 'required|string|max:20',
        'Reservation_Date' => 'required|date',
        'Number_Of_Guest' => 'required|integer|min:1|max:12',
        'user_id' => 'required|integer',
    ]);

    // Example: Save reservation data to the database (create a Reservation model if needed)
    // \App\Models\Reservation::create($data);

    return response()->json([
        'success' => true,
        'message' => 'Reservation submitted successfully!',
    ], 200);
});

Route::apiResource('reservations', ReserveController::class);