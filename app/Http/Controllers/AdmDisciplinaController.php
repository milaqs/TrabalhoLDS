<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class AdmDisciplinaController extends Controller
{
    public function formularioAdicionar() {
        $caminho = route('adm.adicionaDisciplina');
        return view('adm.disciplinas.formulario', compact('caminho'));
    }

    public function formularioAtualizar($id) {
        $disciplinas = Disciplina::find($id);
        $caminho = route('adm.atualizaDisciplina', $id);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas'));
    }

    public function adicionar(Request $req) {
        $dados = $req->all();
        Disciplina::create($dados);
        return redirect()->route('adm.listaDisciplina');
    }

    public function atualizar(Request $req, $id) {
        $dados = $req->all();
        Disciplina::find($id)->update($dados);
        return redirect()->route('adm.listaDisciplina');
    }

    public function listar() {
        $registros = Disciplina::all();
        return view('adm.disciplinas.listar', compact('registros'));
    }

    public function deletar($id) {
        Disciplina::find($id)->delete();
        return redirect()->route('adm.listaDisciplina');
    }
}
