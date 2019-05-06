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

        $req->validate($rules, $messages);
    }

    public function addForm()
    {
        $caminho = route('adm.adicionaDisciplina');
        return view('adm.disciplinas.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        $disciplinas = Disciplina::find($id);
        $caminho = route('adm.atualizaDisciplina', $id);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas'));
    }

    public function insert(Request $req)
    {
        $this->validations($req);

        $dados = $req->all();
        Disciplina::create($dados);

        return redirect()->route('adm.listaDisciplina');
    }

    public function update(Request $req, $id)
    {
        $this->validations($req);

        $dados = $req->all();
        Disciplina::find($id)->update($dados);

        return redirect()->route('adm.listaDisciplina');
    }

    public function selectAll()
    {
        $registros = Disciplina::all();
        return view('adm.disciplinas.listar', compact('registros'));
    }

    public function delete($id)
    {
        Disciplina::find($id)->delete();
        return redirect()->route('adm.listaDisciplina');
    }
}
