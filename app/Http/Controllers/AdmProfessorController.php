<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

class AdmProfessorController extends Controller
{
    public function formularioAdicionar() {
        $caminho = route('adm.adicionaProfessor');
        return view('adm.professores.formulario', compact('caminho'));
    }

    public function formularioAtualizar($id) {
        $professores = Professor::find($id);
        $caminho = route('adm.atualizaProfessor', $id);
        return view('adm.professores.formulario', compact('caminho', 'professores'));
    }

    public function adicionar(Request $req) {
        $dados = $req->all();
        Professor::create($dados);
        return redirect()->route('adm.listaProfessor');
    }

    public function atualizar(Request $req, $id) {
        $dados = $req->all();
        Professor::find($id)->update($dados);
        return redirect()->route('adm.listaProfessor');
    }

    public function listar() {
        $registros = Professor::all();
        return view('adm.professores.listar', compact('registros'));
    }

    public function deletar($id) {
        Professor::find($id)->delete();
        return redirect()->route('adm.listaProfessor');
    }
}
