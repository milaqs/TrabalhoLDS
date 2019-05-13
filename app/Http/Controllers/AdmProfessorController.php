<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

class AdmProfessorController extends Controller
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
            "prontuario_professor" => "required|min:2|max:20|unique:professors",
            "nome_professor" => "required|min:3|max:200",
            "email_professor" => "required|email|unique:professors",
        ];

        $messages = [
            "required" => "Campo obrigatório",
            "prontuario_professor.unique" => "Prontuário em uso.",
            "nome_professor.min" => "O minimo de caracteres é 3.",
            "nome_professor.max" => "O máximo de caracteres é 200.",
            "prontuario_professor.min" => "O minimo de caracteres é 3.",
            "prontuario_professor.max" => "O máximo de caracteres é 20.",
            "email_professor.email" => "Email inválido.",
            "email_professor.unique" => "Email em uso.",
        ];

        $req->validate($rules, $messages);
    }

    public function addForm()
    {
        $this->checkLoggedIn();

        $caminho = route('adm.adicionaProfessor');
        return view('adm.professores.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        $this->checkLoggedIn();

        $professores = Professor::find($id);
        $caminho = route('adm.atualizaProfessor', $id);
        return view('adm.professores.formulario', compact('caminho', 'professores'));
    }

    public function insert(Request $req) {
        
        $this->validations($req);

        $dados = $req->all();
        Professor::create($dados);

        return redirect()->route('adm.listaProfessor');
    }

    public function update(Request $req, $id)
    {
        $this->validations($req);

        $dados = $req->all();
        Professor::find($id)->update($dados);

        return redirect()->route('adm.listaProfessor');
    }

    public function selectAll()
    {
        $this->checkLoggedIn();

        $registros = Professor::all();
        return view('adm.professores.listar', compact('registros'));
    }

    public function delete($id)
    {
        $this->checkLoggedIn();

        Professor::find($id)->delete();
        return redirect()->route('adm.listaProfessor');
    }
}
