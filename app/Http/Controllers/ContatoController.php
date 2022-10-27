<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        // print_r($_GET);exit;
        // var_dump($_GET);
        // echo '<pre>';
        //  print_r($request->all());
        //  echo '/<pre>';
        // echo $request->phone;

        // $contato = new SiteContato();

        // // $contato->name = $request->name;
        // // $contato->phone = $request->phone;
        // // $contato->reason_for_contact = $request->reason_for_contact;
        // // $contato->message = $request->message;
        // //print_r($contato->getAttributes());
        // $contato->save();


        // $contato->fill($request->all());
        // $contato->save();


        // $contato->create($request->all());

        return view('site.contato');
    }


    public function salvar(Request $request){

        $contato = new SiteContato();
    $regras = [
        'name' => 'required|min:3|max:400', 'phone' => 'required',
        'email' => 'required|email','reason_for_contact' => 'required', 'message' => 'required'
    ];

    $feedback = [
        'name.required' => 'O campo nome precisa ser preenchido!', 'name.min' => 'campo nome precisar ter no mínimo 3 caracteres', 'name.max' => 'campo nome deve ter no máximo 400 caracteres',
        'phone.required' => 'campo telefone precisar ser preenchido',
        'email.email' => 'email informado não é valido',

        'required' => 'o campo :attribute precisa ser preenchido'
    ];

    $request->validate($regras , $feedback);


// dd($request->all());
        $contato->create($request->all());

       return back();

    }
}
