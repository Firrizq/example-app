<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('tes', function () {
    return view('tes');
});

Route::get('/hello', function () {
    return response() -> json ([
        'message' => "hello world"
    ]);
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks{id}', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);

// Route::get('/tasks/{key}', function($key) use ($tasklist){
//     $tasklist[request() -> key] = request()->task;
//     return $tasklist;
// });

// Route::patch('/tasks/{key}', function($key) use ($tasklist){
//     $tasklist[request()->key] = request()->task;
//     return $tasklist;
// });




// Route::post('/tasks/{key}', function($key) use ($taskList){
//     //return request()->all();
//     $taskList[request()->key] = request()->task;
//     return $taskList;
// }); store