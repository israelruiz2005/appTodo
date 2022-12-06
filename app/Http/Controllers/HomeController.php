<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        
        // Pesquisa no Model use App\Models\Task
        // Cria um array e passa para view
        //Recebe a data atual por variavel
        if($request->date){
            $filteredDate = $request->date;    
        } else{
            $filteredDate = date('Y-m-d');
        }
        //Formatação de datas
        $carbonDate = Carbon::createFromDate($filteredDate);
        
        $data['date_as_string'] = $carbonDate->translatedFormat('d') . ' de '.ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        $data['tasks'] = Task::WhereDate('due_date', $filteredDate)->get();
        $data['AuthUser'] = Auth::user();
        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();
        //$tasks = Task::all()->take(5);
        //return view('home',['tasks'=>$tasks]);
        return view('home', $data);
    }
}
