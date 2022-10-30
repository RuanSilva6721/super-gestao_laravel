<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    // public function index() {
    //     // $fornecedores = [
    //     //     0 => [
    //     //         'nome' => 'Fornecedor 1',
    //     //         'status' => 'N',
    //     //         'cnpj' => '0',
    //     //         'ddd' => '', //São Paulo (SP)
    //     //         'telefone' => '0000-0000'
    //     //     ],
    //     //     1 => [
    //     //         'nome' => 'Fornecedor 2',
    //     //         'status' => 'S',
    //     //         'cnpj' => null,
    //     //         'ddd' => '85', //Fortaleza (CE)
    //     //         'telefone' => '0000-0000'
    //     //     ],
    //     //     2 => [
    //     //         'nome' => 'Fornecedor 2',
    //     //         'status' => 'S',
    //     //         'cnpj' => null,
    //     //         'ddd' => '32', //Juiz de fora (MG)
    //     //         'telefone' => '0000-0000'
    //     //     ]
    //     // ];

    //     // return view('app.fornecedor.index', compact('fornecedores'));
    // }

    public function index(){
        return view('app.fornecedor.index');
    }



    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('name', 'like', '%'.$request->input('name').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }

    public function adicionar(Request $request) {

        $msg = '';
        
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
            $regras = [
                'name' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    public function editar($id, $msg = '') {
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
