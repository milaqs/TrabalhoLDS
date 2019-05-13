<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class AdmDisciplinaController extends Controller
{
    public function checkLoggedIn() {
        if (!AdmServidorController::isLogged()) {
            var_dump("oi");
            die;
            $caminho = route('adm.verificarLogin');
            return view('adm.servidores.login', compact('caminho'));
        }
    }

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
        $this->checkLoggedIn();

        $caminho = route('adm.adicionaDisciplina');
        return view('adm.disciplinas.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        $this->checkLoggedIn();

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
        $this->checkLoggedIn();

        $registros = Disciplina::all();
        return view('adm.disciplinas.listar', compact('registros'));
    }

    public function delete($id)
    {
        $this->checkLoggedIn();

        Disciplina::find($id)->delete();
        return redirect()->route('adm.listaDisciplina');
    }
}
