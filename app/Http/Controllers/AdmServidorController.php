<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servidor;

class AdmServidorController extends Controller
{
    public function validations(Request $req)
    {
        $rules = [
            "nome_servidor" => "required|min:3|max:200",
            "email_servidor" => "required|email|unique:servidors",
            "prontuario_servidor" => "required|min:3|max:20",
            "senha_servidor" => "required|min:3|max:20",
        ];

        $messages = [
            "required" => "Este campo é obrigatório",
            "email_servidor.email" => "Email inválido",
            "email_servidor.unique" => "Email em uso",
            "nome_servidor.min" => "Minimo de caracteres é 3",
            "nome_servidor.max" => "Maxmo de caracteres é 200",
            "prontuario_servidor.min" => "Minimo de caracteres é 3",
            "prontuario_servidor.min" => "Maximo de caracteres permitidos é 20",
            "senha_servidor.min" => "Minimo de caracteres é 3",
            "senha_servidor.min" => "Maximo de caracteres permitidos é 20"
        ];

        $req->validate($rules, $messages);
    }

    public function addForm()
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        $caminho = route('adm.adicionaServidor');
        return view('adm.servidores.formulario', compact('caminho'));
    }

    public function updateForm($id)
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        $servidores = Servidor::find($id);
        $caminho = route('adm.atualizaServidor', $id);
        return view('adm.servidores.formulario', compact('caminho', 'servidores'));
    }

    public function insert(Request $req)
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        $this->validations($req);

        $dados = $req->all();
        Servidor::create($dados);

        return redirect()->route('adm.listaServidor');
    }

    public function update(Request $req, $id)
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        $this->validations($req);

        $dados = $req->all();
        Servidor::find($id)->update($dados);

        return redirect()->route('adm.listaServidor');
    }

    public function selectAll()
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        $registros = Servidor::all();
        return view('adm.servidores.listar', compact('registros'));
    }

    public function delete($id)
    {
        if (!$this->isLogged()) {
            return redirect()->route('adm.formLogin');
        }

        Servidor::find($id)->delete();
        return redirect()->route('adm.listaServidor');
    }

    public static function isLogged()
    {
        $servidor = session('servidor');
        if (!isset($servidor)) {
            return false;
        }

        return true;
    }

    public function login()
    {
       
        if ($this->isLogged()) {
            return redirect()->route('adm.listaServidor');
        }

        $caminho = route('adm.verificarLogin');
        return view('adm.servidores.login', compact('caminho'));
    }

    public function signUp(Request $req)
    {
        $req->validate([
            'prontuario_servidor' => 'required',
            'senha_servidor' => 'required'
        ], [
            'required' => 'Campo vazio'
        ]);

        $servidor = Servidor::where([
            ['prontuario_servidor', '=', $req->prontuario_servidor],
            ['senha_servidor', '=', $req->senha_servidor]
        ])->first();

        if (empty($servidor)) {
            $loginError = 'Login ou senha inválidos.';
            return view('adm.servidores.login', [
                'message' => $loginError,
                'caminho' => route('adm.verificarLogin')
                ]);
        }

      $req->session()->put('servidor', $servidor->prontuario_servidor);

      return redirect()->route('adm.listaServidor');
    }

    public function index()
    {
        if (!$this->isLogged()) {
            $caminho = route('adm.verificarLogin');
            return view('adm.servidores.login', compact('caminho'));
        }

        return view('adm.servidores.index');
    }
}
