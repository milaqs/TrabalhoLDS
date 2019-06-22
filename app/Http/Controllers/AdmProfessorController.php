<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdmProfessorController extends Controller
{
    private $validacao;

    function __construct() {
        $this->validacao = new Validacao();
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
        $this->validacao->validaInsereUsuario($req);
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
            'password' => Hash::make('password', 
            ['rounds' => 12]),
        ]);
    }

    public function update(Request $req, $id) {   
        $this->validacao->validaAtualizaUsuario($req);
        $dados = $req->all();
        User::find($id)->update($dados);
        return redirect()->route('adm.listaProfessor');
    }

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
