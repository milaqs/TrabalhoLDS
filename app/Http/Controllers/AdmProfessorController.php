<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdmProfessorController extends Controller
{
    

    public function validations(Request $req) {
        $rules = [
            "nome" => "required|min:3|max:200",
            "email" => "required|email|unique:users",
            "prontuario" => "required|min:3|max:30",
            "password" => "required|min:3|max:100",
        ];

        $messages = [
            "required" => "Este campo é obrigatório",
            "email.email" => "Email inválido",
            "email.unique" => "Email em uso",
            "nome.min" => "Minimo de caracteres é 3",
            "nome.max" => "Maxmo de caracteres é 200",
            "prontuario.min" => "Minimo de caracteres é 3",
            "prontuario.min" => "Maximo de caracteres permitidos é 30",
            "password.min" => "Minimo de caracteres é 3",
            "password.min" => "Maximo de caracteres permitidos é 100"
        ];

        $req->validate($rules, $messages);
    }

    public function index() {
        return view ('adm.professores.index');
    }

    public function addForm()
    {
        $caminho = route('adm.adicionaProfessor');
        return view('adm.professores.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        $professores = User::find($id);
        $caminho = route('adm.atualizaProfessor', $id);
        return view('adm.professores.formulario', compact('caminho', 'professores'));
    }

    public function insert(Request $req) {
        $this->validations($req);
        $dados = $req->all();
        $this->createUser($dados);
        return redirect()->route('adm.listaProfessor');
    }

    private function createUser($data) {
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'prontuario' => $data['prontuario'],
            'tipo' => $data['tipo'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(Request $req, $id)
    {   
        $this->validations($req);
        $dados = $req->all();
        User::find($id)->update($dados);
        return redirect()->route('adm.listaProfessor');
    }

    // private function isHashed($string) {
    //     $hash = Hash::make($string);
    //     if (Hash::check($string, $hash)) {
    //         return true;
    //     }
    //     return false;
    // }


    public function selectAll()
    {
        $registros = User::all()->where('tipo', 'professor');
        return view('adm.professores.listar', compact('registros'));
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('adm.listaProfessor');
    }
}
