<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        // print_r($_GET);exit;
        // var_dump($_GET);
        return view('site.contato');
    }
}
