<?php

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

$tasklist = [
    'first' => 'sleep',
    'second' => 'work',
    'third' => 'play'
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('tes', function () {
    return view('tes');
});

Route::get('/hello', function () {
    return response() -> json ([
        'message' => "hello world"
    ]);
});

Route::get('/tasks', function() use ($tasklist){
    if (request() -> search) {
        return $tasklist[request()->search];
    } else {
        return $tasklist;
    }
});

Route::get('/tasks{param}', function($param) use ($tasklist){
    return $tasklist[$param];
});

Route::get('/tasks/{key}', function($key) use ($tasklist){
    $tasklist[request() -> key] = request()->task;
    return $tasklist;
});

Route::patch('/tasks/{key}', function($key) use ($tasklist){
    $tasklist[request()->key] = request()->task;
    return $tasklist;
});

Route::delete('/tasks/{key}', function($key) use ($tasklist) {
    unset($taskList[$key]);
    return $tasklist;
});