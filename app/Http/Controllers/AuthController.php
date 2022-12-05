<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){
        //Verifica se esta logado
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login_action(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //autentica
        if (Auth::attempt($validator)){
            return redirect()->route('home');
        }
    }

    public function register(Request $request){
        //Verifica se esta logado
        if(Auth::check()){
            return redirect()->route('home');
        }
        
        return view('register');
    }

    public function register_action(Request $request){
        //Regras de validação a serem aplicadas no formulario de login exemplo
        /*
         -- O usuário tem que ter um nome preenchdio
         -- O Email deverá ser único na tabela de usuário
         -- Todos os campos são obrigatorios
         -- A senha deve ter no minimo 6 caracteres
         */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data = $request->only('name', 'email', 'password');
        //senha com hash
        $data['password'] = Hash::make($data['password']);
        //Grava usuário no banco
        User::create($data);
        //vai para tela de login
        return redirect(route('login'));
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
