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

        $task = Tasks::paginate(4);
        return view('task.index', [
            'data' => $task
        ]);
    }

    public function show($id) {
        // return $this -> tasklist($param);
        $task = Tasks::find($id);
        return $task;

    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        Tasks::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }

    public function edit($id){
        $task = Tasks::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id) {
        // $this-> tasklist[request()->key] = $request->task;
        // return $this->tasklist;

        $task = Tasks::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }

    public function delete($id) {
        $task = Tasks::find($id)
        ->delete();
        return redirect('/tasks');
    }
}