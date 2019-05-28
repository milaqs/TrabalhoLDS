<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Espaco;
use App\Curso;
use App\Solicitacao;
use App\User;
use Auth;

class AdmSolicitacaoController extends Controller {

    public function historicoSolitacoes() {
        $registros = Solicitacao::all()->sortBy('status');
        $this->formataValoresLista($registros);
        return view('adm.servidores.historicoSolicitacoes', compact('registros'));
    }

    public function listarSolicitacoes() {
        $registros = Solicitacao::all()->where('status', 'aguardando');
        $this->formataValoresLista($registros);
        return view('adm.servidores.listarSolicitacoes', compact('registros'));
    }

    public function aprovarSolicitacoes($id, $op) {
        $status = ($op == 'aprovado') ? 'aprovado' : 'reprovado';
        Solicitacao::find($id)->update(array('status' => $status));
        return redirect()->route('adm.listarSolicitacoes');
    }

    public function listarMinhasSolicitacoes() {
        $registros = Solicitacao::all()->where('id_professor', Auth::id());
        $this->formataValoresLista($registros);
        return view ('adm.professores.listarMinhasSolicitacoes', compact('registros'));
    }

    public function solicitaEspaco() {
        $espacos = Espaco::all();
        $cursos  = Curso::all();
        $disciplinas = Disciplina::all();
        $usuario_id = Auth::id();
        return view('adm.professores.solicitaEspaco', compact('espacos', 'cursos', 'disciplinas', 'usuario_id'));
    }

    public function registraSolicitacao(Request $req) {
        $dados = $req->all();
        Solicitacao::create($dados);
        return redirect()->route('adm.listarMinhasSolicitacoes');
    }

    private function formataValoresLista($registros) {
        $this->defineNomeEspaco($registros);
        $this->defineNomeCurso($registros);
        $this->defineNomeDisciplina($registros);
        $this->defineNomeProfessor($registros);
    }

    private function defineNomeEspaco($registros) {
        foreach($registros as $registro) {
            $espaco = Espaco::find($registro->id_espaco);
            $registro->id_espaco = $espaco->nome_espaco;
        }
    }

    private function defineNomeCurso($registros) {
        foreach($registros as $registro) {
            $curso = Curso::find($registro->id_curso);
            $registro->id_curso = $curso->nome_curso;
        }
    }

    private function defineNomeDisciplina($registros) {
        foreach($registros as $registro) {
            $disciplina = Disciplina::find($registro->id_disciplina);
            $registro->id_disciplina = $disciplina->nome_disciplina;
        }
    }

    private function defineNomeProfessor($registros) {
        foreach($registros as $registro) {
            $professor = User::find($registro->id_professor);
            $registro->id_professor = $professor->nome;
        }
    }
}
