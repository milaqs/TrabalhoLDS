<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Curso;

class AdmDisciplinaController extends Controller
{
    private $validacao;

    function __construct() {
        $this->validacao = new Validacao();
    }

    public function addForm() {
        $caminho = route('adm.adicionaDisciplina');
        $disciplinas = Disciplina::all();
        $cursos = Curso::all();
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas', 'cursos'));
    }

    public function updateForm($id) {
        $usuario = Disciplina::find($id);
        $disciplinas = Disciplina::all();
        $cursos = Curso::all();
        $caminho = route('adm.atualizaDisciplina', $id);
        return view('adm.disciplinas.formulario', compact('caminho', 'disciplinas', 'usuario', 'cursos'));
    }

    public function insert(Request $req) {
        $this->validacao->validaInsereDisciplina($req);
        $dados = $req->all();
        Disciplina::create($dados);
        return redirect()->route('adm.listaDisciplina');
    }

    public function update(Request $req, $id) {
        $this->validacao->validaAtualizaDisciplina($req);
        $dados = $req->all();
        Disciplina::find($id)->update($dados);
        return redirect()->route('adm.listaDisciplina');
    }

    public function selectAll() {
        $registros = Disciplina::all()->sortBy('nome_disciplina');
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
        $curso = Curso::where('id', '=', $registro->id_curso)->firstOrFail();
        $registro->setattribute('nome_curso', $curso['nome_curso']);
       }
    }
}
