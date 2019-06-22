<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Validacao extends Controller {
    
    private $requisitos;
    private $mensagens;

    function __construct() {
        $this->mensagens();
    }
    
    public function validaInsereUsuario(Request $req) {
        $this->requisitosInsereUsuario();
        $req->validate($this->requisitos, $this->mensagens);
    }

    public function validaAtualizaUsuario(Request $req) {
        $this->requisitosAtualizaUsuario();
        $req->validate($this->requisitos, $this->mensagens);
    }

    public function validaInsereDisciplina(Request $req) {
        $this->requisitosInsereDisciplina();
        $req->validate($this->requisitos, $this->mensagens);
    }

    public function validaAtualizaDisciplina(Request $req) {
        $this->requisitosAtualizaDisciplina();
        $req->validate($this->requisitos, $this->mensagens);
    }

    public function validaEspaco(Request $req) {
        $this->requisitosEspaco();
        $req->validate($this->requisitos, $this->mensagens);
    }

    public function validaCurso(Request $req) {
        $this->requisitosCurso();
        $req->validate($this->requisitos, $this->mensagens);
    }

    private function requisitosInsereUsuario() {
        $this->requisitos = [
            "nome" => "required|min:3|max:200",
            "email" => "required|email|unique:users",
            "prontuario" => "required|min:3|max:20|unique:users",
        ];
    }

    private function requisitosAtualizaUsuario() {
        $this->requisitos = [
            "nome" => "required|min:3|max:200",
        ];
    }

    private function requisitosInsereDisciplina() {
        $this->requisitos = [
            "nome_disciplina" => "required|min:3|max:50",
            "id_curso" => "required",
            "carga_horaria" => "required",
            "semestre" => "required",
        ];
    }

    private function requisitosAtualizaDisciplina() {
        $this->requisitos = [
            "id" => "required",
            "id_curso" => "required",
            "nome_disciplina" => "required|min:3|max:50",
            "carga_horaria" => "required",
            "semestre" => "required",
        ];
    }

    private function requisitosEspaco() {
        $this->requisitos = [
            "nome_espaco" => "required|min:3|max:50",
            "capacidade_espaco" => "required|numeric|min:1",
            "descricao_espaco" => "required",
        ];
    }

    private function requisitosCurso() {
        $this->requisitos = [
            "nome_curso" => "required|min:3|max:200",
            "descricao_curso" => "required",
            "nivel_curso" => "required",
        ];
    }



    private function mensagens() {
        $this->mensagens = [
            "required" => "Este campo é obrigatório",
            "email.email" => "Email inválido",
            "email.unique" => "Email em uso",
            "nome.min" => "Mínimo de caracteres é 3",
            "nome.max" => "Máximo de caracteres é 200",
            "prontuario.min" => "Mínimo de caracteres é 3",
            "prontuario.max" => "Máximo de caracteres permitidos é 20",
            "prontuario.unique" => "O prontuário já existe",
            "nome_disciplina.min" => "O minimo de caracteres é 3.",
            "nome_disciplina.max" => "O máximo de caracteres é 50.",
            'capacidade_espaco.min' => "É obrigário ter no minimo 1",
            "nome_espaco.min" => "O minimo de caracteres é 3.",
            "nome_espaco.max" => "O máximo de caracteres é 50.",
            "nome_curso.min" => "O mínimo de caracteres é 3",
            "nome_curso.max" => "O máximo de caracteres é 200",
        ];
    }
    
}
