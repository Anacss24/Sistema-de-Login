<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::post('/auten', function (Request $request) {
    $credentials =$request->only('email', 'password');

    if(Auth::attempt($credentials)){
        $user =$request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "acesse_token" =>$token,
            "token_type" => 'Bearer'
        ]);
    }

    return response()->json([
        "message" => "Usuário inválido"
    ], 404);


});

Route::middleware('auth:sanctum')->get('/user/profile', function (Request $request) {
    return $request->user();
});

Route::get('/login', [ApiController::class, 'getAllLogin']);
Route::get('/login/{id}', [ApiController::class, 'getLogin']);
Route::post('/login', [ApiController::class, 'store']);
Route::put('/login/{id}', [ApiController::class, 'update']);

Route::middleware(['auth:sanctum', 'can:delete,App\Model'])->delete('/login/{id}', [ApiController::class, 'delete']);
