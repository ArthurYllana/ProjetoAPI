<?php
use App\Models\User;
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

    /** User CRUD */
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::get('/users', function (Request $request) {
        $users = User::all();
//        $users = [];

//        $message = 'Registros encontrados.';
//        if (count($users) === 0) {
//            $message = 'Nenhum registro encontrado.';
//        }
        $message = count($users) === 0 ? "Nenhum registro encontrado" : "Registros encontrados";

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => $message,
            'data' => $users,
        ]);
    });
});
