<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdmServidorController extends Controller
{
    public function validations(Request $req) {
        $rules = [
            "nome" => "required|min:3|max:200",
            "email" => "required|email|unique:users",
            "prontuario" => "required|min:3|max:20",
            "password" => "required|min:3|max:20",
        ];

        $messages = [
            "required" => "Este campo é obrigatório",
            "email.email" => "Email inválido",
            "email.unique" => "Email em uso",
            "nome.min" => "Minimo de caracteres é 3",
            "nome.max" => "Maxmo de caracteres é 200",
            "prontuario.min" => "Minimo de caracteres é 3",
            "prontuario.min" => "Maximo de caracteres permitidos é 20",
            "password.min" => "Minimo de caracteres é 3",
            "password.min" => "Maximo de caracteres permitidos é 20"
        ];

        $req->validate($rules, $messages);
    }

    public function index() {
        return view('adm.servidores.index');
    }

    public function addForm() {
        $caminho = route('adm.adicionaServidor');
        return view('adm.servidores.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        $servidores = User::find($id);
        $caminho = route('adm.atualizaServidor', $id);
        return view('adm.servidores.formulario', compact('caminho', 'servidores'));
    }

    public function insert(Request $req) {
        // User::sendWelcomeEmail($dados);
        //$pw = User::generatePassword();
        $this->validations($req);
        $dados = $req->all();
        $this->createUser($dados);
        return redirect()->route('adm.listaServidor');
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

    public function update(Request $req, $id) {
        $this->validations($req);
        $dados = $req->all();
        User::find($id)->update($dados);
        return redirect()->route('adm.listaServidor');
    }

    public function selectAll() {
        $registros = User::all()->where('tipo', 'servidor');
        return view('adm.servidores.listar', compact('registros'));
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect()->route('adm.listaServidor');
    }
}
