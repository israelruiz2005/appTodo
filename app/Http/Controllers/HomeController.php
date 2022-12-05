<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    public function index(Request $request){
        
        // Pesquisa no Model use App\Models\Task
        // Cria um array e passa para view

        $tasks = Task::all()->take(5);
        return view('home',['tasks'=>$tasks]);
    }
}
