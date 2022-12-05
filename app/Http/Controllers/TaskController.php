<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index (){
        
    }

    public function create(Request $request){
        //Carrega categorias
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('tasks.create',$data);
    }

    public function create_action(Request $request){
        $task = $request->only(['title','category_id','description','due_date']);
        //apenas para uso sem login um exmeplo de Create pronto.
        $task['user_id'] = 1;
        $dbTask = Task::create($task);
        return redirect(route('home'));
    }
    public function edit(Request $request){
        $id = $request->id;
        $task = Task::find($id);

        if(!$task){
            return redirect(route('home'));
        }

        $data['task'] = $task;
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('tasks.edit',$data);
    }

    public function edit_action(Request $request){
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);
        
        //Analise se a task faz sentido, se existe
        $task = Task::find($request->id);
        if(!$task) {
            return "Errou";
        }
        //Analisa se o checkbox foi marcado ou desmarcado no form
        $request_data['is_done'] = $request->is_done ? true : false;

        $task->update($request_data);
        $task->save();
        return redirect(route('home'));
    }
    public function delete(Request $request){
        $id = $request->id;

        $task = Task::find($id);

        if($task){
            $task->delete();
        }
        //deleta e redireciona
        return redirect(route('home'));
    }

    public function update(Request $request){
        $task = Task::findOrFail($request->taskId);
        //Atualizando o campo is_done via js
        $task->is_done = $request->status;
        $task->save();
        return ['success' => true];
    }
}
