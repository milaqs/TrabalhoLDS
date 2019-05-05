<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servidor;

class AdmServidorController extends Controller
{
    public function validations(Request $req)
    {
        $rules = [
            "name" => "required|min:3|max:200",
            "email" => "required|email|unique:servidor, email",
            "password" => "required|min:3|max:20"
        ];

        $messages = [
            "required" => "Este campo é obrigatório",
            "email.email" => "Email inválido",
            "email.unique" => "Email em uso",
            "name.min" => "Minimo de caracteres é 3",
            "name.max" => "Maxmo de caracteres é 200",
            "password.min" => "Minimo de caracteres é 3",
            "password.min" => "Maximo de caracteres permitidos é 20"
        ];

        $req->validations($rules, $messages);
    }

    public function formularioAdicionar()
    {
        $caminho = route('adm.adicionaServidor');
        return view('adm.servidores.formulario', compact('caminho'));
    }

    public function formularioAtualizar($id)
    {
        $servidores = Servidor::find($id);
        $caminho = route('adm.atualizaServidor', $id);
        return view('adm.servidores.formulario', compact('caminho', 'servidores'));
    }

    public function adicionar(Request $req)
    {
        $this->validations($req);

        $dados = $req->all();
        Servidor::create($dados);

        return redirect()->route('adm.listaServidor');
    }

    public function atualizar(Request $req, $id)
    {
        $this->validations($req);

        $dados = $req->all();
        Servidor::find($id)->update($dados);

        return redirect()->route('adm.listaServidor');
    }

    public function listar()
    {
        $registros = Servidor::all();
        return view('adm.servidores.listar', compact('registros'));
    }

    public function deletar($id)
    {
        Servidor::find($id)->delete();
        return redirect()->route('adm.listaServidor');
    }
}
