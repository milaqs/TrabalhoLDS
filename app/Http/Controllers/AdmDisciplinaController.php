<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class AdmDisciplinaController extends Controller
{
    public function validations(Request $req)
    {
        $rules = [
            "curso_disciplina" => "required|min:3|max:50",
            "nome_disciplina" => "required|min:3|max:50",
            "carga_horaria" => "required",
        ];

        $messages = [
            "required" => "Campo obrigatório",
            "nome_disciplina.min" => "O minimo de caracteres é 3.",
            "nome_disciplina.max" => "O máximo de caracteres é 50.",
            "curso_disciplina.min" => "O minimo de caracteres é 3.",
            "curso_disciplina.max" => "O máximo de caracteres é 50."
        ];

        $req->validations($rules, $messages);
    }

    public function formularioAdicionar()
    {
        $caminho = route('adm.adicionaDisciplina');
        return view('adm.disciplinas.formulario', compact('caminho'));
    }

    public function formularioAtualizar($id)
    {
        $disciplinas = Disciplina::find($id);
        $caminho = route('adm.atualizaDisciplina', $id);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas'));
    }

    public function adicionar(Request $req)
    {
        $this->validations($req);

        $dados = $req->all();
        Disciplina::create($dados);

        return redirect()->route('adm.listaDisciplina');
    }

    public function atualizar(Request $req, $id)
    {
        $this->validations($req);

        $dados = $req->all();
        Disciplina::find($id)->update($dados);

        return redirect()->route('adm.listaDisciplina');
    }

    public function listar()
    {
        $registros = Disciplina::all();
        return view('adm.disciplinas.listar', compact('registros'));
    }

    public function deletar($id)
    {
        Disciplina::find($id)->delete();
        return redirect()->route('adm.listaDisciplina');
    }
}
