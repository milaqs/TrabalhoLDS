<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class AdmCursoController extends Controller
{
    private $validacao;

    function __construct() {
        $this->validacao = new Validacao();
    }

    public function addForm() {
        $caminho = route('adm.adicionaCurso');
        return view('adm.cursos.formulario', compact('caminho'));
    }

    public function updateForm($id) {
        $caminho = route('adm.atualizaCurso', $id);
        $curso = Curso::find($id);
        return view('adm.cursos.formulario', compact('caminho', 'curso'));
    }

    public function insert(Request $req) {
        $this->validacao->validaCurso($req);
        $dados = $req->all();
        Curso::create($dados);
        return redirect()->route('adm.listaCurso');
    }

    public function update(Request $req, $id) {
        $this->validacao->validaCurso($req);
        $dados = $req->all();
        Curso::find($id)->update($dados);
        return redirect()->route('adm.listaCurso');
    }

    public function selectAll() {
        $registros = Curso::all()->sortBy('nome_curso');
        return view('adm.cursos.listar', compact('registros'));
    }

    public function delete($id) {
        Curso::find($id)->delete();
        return redirect()->route('adm.listaCurso');
    }
}
