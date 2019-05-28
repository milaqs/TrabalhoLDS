<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Curso;

class AdmDisciplinaController extends Controller
{
    public function validations(Request $req) {
        $rules = [
            "id_disciplina" => "required",
            "nome_disciplina" => "required|min:3|max:50",
            "carga_horaria" => "required",
        ];

        $messages = [
            "required" => "Campo obrigatório",
            "nome_disciplina.min" => "O minimo de caracteres é 3.",
            "nome_disciplina.max" => "O máximo de caracteres é 50."
        ];

        $req->validate($rules, $messages);
    }

    public function addForm() {
        $caminho = route('adm.adicionaDisciplina');
        $disciplinas = Disciplina::all();
        $this->formataDadosObjeto($disciplinas);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas'));
    }

    public function updateForm($id) {
        $usuario = Disciplina::find($id);
        $disciplinas = Disciplina::all();
        $this->formataDadosObjeto($disciplinas);
        $caminho = route('adm.atualizaDisciplina', $id);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas', 'usuario'));
    }

    public function insert(Request $req) {
        $dados = $req->all();
        Disciplina::create($dados);
        return redirect()->route('adm.listaDisciplina');
    }

    public function update(Request $req, $id) {
        $this->validations($req);

        $dados = $req->all();
        Disciplina::find($id)->update($dados);

        return redirect()->route('adm.listaDisciplina');
    }

    public function selectAll() {
        $registros = Disciplina::all();
        $this->formataDadosObjeto($registros);
        return view('adm.disciplinas.listar', compact('registros'));
    }

    public function delete($id) {
        Disciplina::find($id)->delete();
        return redirect()->route('adm.listaDisciplina');
    }

    private function formataDadosObjeto($registros) {
        $this->defineNomeCurso($registros);
    }

    private function defineNomeCurso($registros) {
       foreach($registros as $registro) {
        $curso = Curso::find($registro->id);
        $registro->setattribute('nome_curso', $curso->nome_curso);
       }
    }
}
