<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{ 
    private $tasklist = [
        'first' => 'sleep',
        'second' => 'work',
        'third' => 'play'
    ];

    public function index(Request $request){
        // if (request() -> search) {
        //     return $this -> tasklist[$request->search];
        // }

        // return $this -> tasklist;
        if ($request -> search) {
            $task = DB::table('tasks')->where('task', 'LIKE', "%request->search%");
        }

        $task = DB::table('tasks')->get();
        return $task;
    }

    public function show($id) {
        // return $this -> tasklist($param);
        $task = DB::table('tasks')->where('id', $id)->get();

        return $task;

    }

    public function store(Request $request) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'Success';
    }

    public function update(Request $request, $id) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        $task = DB::table('tasks')->where('id', $id)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'Success';
    }

    public function delete(Request $request, $id) {
        // unset($this->tasklist[$key]);
        // return $this -> tasklist;

        $task = DB::table('tasks')
        ->where('id', $id)
        ->delete();
        return 'Success';
    }
}