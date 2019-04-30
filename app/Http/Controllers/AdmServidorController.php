<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servidor;

class AdmServidorController extends Controller
{
    public function formularioAdicionar() {
        $caminho = route('adm.adicionaServidor');
        return view('adm.servidores.formulario', compact('caminho'));
    }

    public function formularioAtualizar($id) {
        $servidores = Servidor::find($id);
        $caminho = route('adm.atualizaServidor', $id);
        return view('adm.servidores.formulario', compact('caminho', 'servidores'));
    }

    public function adicionar(Request $req) {
        $dados = $req->all();
        Servidor::create($dados);
        return redirect()->route('adm.listaServidor');
    }

    public function atualizar(Request $req, $id) {
        $dados = $req->all();
        Servidor::find($id)->update($dados);
        return redirect()->route('adm.listaServidor');
    }

    public function listar() {
        $registros = Servidor::all();
        return view('adm.servidores.listar', compact('registros'));
    }

    public function deletar($id) {
        Servidor::find($id)->delete();
        return redirect()->route('adm.listaServidor');
    }
}
