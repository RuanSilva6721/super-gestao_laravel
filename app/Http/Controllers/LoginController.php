<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = $request->erro;
         //dd($erro);

         if($erro == 1){
            $erro = 'Usuário ou senha inválidos';
         }elseif($erro= 2){
            $erro = 'Usuário inválido!';
         }


        return view('site.login', ["title" => 'login', 'erro'=> $erro]);
    }
    public function autenticar(Request $request){

        $regras =[
          'user' =>'email',
          'password' => 'required'
        ];

        $feedback = [
            'user.email' => 'O campo usuário(email) é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $user = new User();

        $email = $request->user;
        $password = $request->password;

        $usuario = $user->where('email',$email)->where('password',$password)->get()->first();

        // $existe =  $existe->first();

        if($usuario){
            session_start();

            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            // dd($_SESSION);


            return redirect()->route('app.clientes');
        }

        return redirect()->route('site.login', ['erro' => 1]);

    }
    public function sair(){
        if (!isset($_SESSION))
        {
            session_start();
        }

       session_destroy();

       return redirect()->route('site.index');

    }
}
