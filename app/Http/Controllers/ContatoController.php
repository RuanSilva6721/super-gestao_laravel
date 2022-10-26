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
        $request->validate([
            'name|min:3|max:400' => 'required', 'phone' => 'required', 'reason_for_contact' => 'required', 'message' => 'required'
        ]);



        $contato->create($request->all());

       return back();

    }
}
