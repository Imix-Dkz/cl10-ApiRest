<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Se Añade el controlador que creamos hace un momento
use App\Http\Controllers\API\PersonController;


/* //API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/persons')->group(function(){
    //Se registran las rutas de los Metodos CRUD
    Route::post('/',[ PersonController::class, 'create']); //C
    Route::get('/',[ PersonController::class, 'get']); //R
    Route::get('/{id}',[ PersonController::class, 'getById']); //R by Id
    Route::put('/{id}',[ PersonController::class, 'update']); //U
    Route::delete('/{id}',[ PersonController::class, 'delete']); //D
});

/* [Nota] Para probar la ruta, se requiere configurar postman de la siguiente manera
    Ruta principal: localhost:8000/api/v1/persons
    Headers, key=>"Conten-Type", Value=>"application/json"
    POST > localhost:8000/api/v1/persons
        body, raw{
            "name":"Darketzer",
            "addres": "Jiutepec",
            "phone":1234567890
        }


*/