<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdmServidorController extends Controller
{
    private $validacao;

    function __construct() {
        $this->validacao = new Validacao();
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
        $this->validacao->validaInsereUsuario($req);
        $dados = $req->all();
        $this->createUser($dados);
        //User::sendWelcomeEmail($dados);
        return redirect()->route('adm.listaServidor');
    }

    public function update(Request $req, $id) {
        $this->validacao->validaAtualizaUsuario($req);
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
}
