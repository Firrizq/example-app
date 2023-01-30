<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tasks;

class TaskController extends Controller
{

    public function index(Request $request){
        if ($request -> search) {
            $task = Tasks::where('task', 'LIKE', "%$request->search%")->get();
            return $task;
        }

        $task = Tasks::all();
        return $task;
    }

    public function show($id) {
        // return $this -> tasklist($param);
        $task = Tasks::find($id);
        return $task;

    }

    public function store(Request $request) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        Tasks::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'Success';
    }

    public function update(Request $request, $id) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        $task = Tasks::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return $task;
    }

    public function delete($id) {
        $task = Tasks::find($id)
        ->delete();
        return 'Success';
    }
}
