<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitacao;
use App\Disciplina;
use App\Espaco;
use App\Curso;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function index() {
        $espacos = Espaco::all();
        $disciplinas = Disciplina::all();
        $cursos = Curso::all();

        return view('home', compact('espacos', 'disciplinas', 'cursos'));
    }
    
    public function logout() {
        if(Auth::check()){
            Auth::logout();
            return redirect('home');
        }
        return back()->withInput();
    }

    public function filtrar(Request $request) {

        $dados = $request->all();

        $id_curso = $dados['id_curso'] ? $dados['id_curso'] : null;
        $id_disciplina = $dados['id_disciplina'] ? $dados['id_disciplina'] : null;
        $id_espaco = $dados['id_espaco'] ? $dados['id_espaco'] : null;

        $solicitacoes = $this->filtrarSolicitacoes($id_curso, $id_espaco, $id_disciplina);

        $horarios = $this->horariosAula($solicitacoes);
        $espacos = Espaco::all();
        $disciplinas = Disciplina::all();
        $cursos = Curso::all();

        return view('home', compact('espacos', 'disciplinas', 'cursos', 'horarios'));
    }

    public function horariosAula($solicitacoes) {
        $horariosAula = [
            '19:00:00' => '19:00 às 19:50',
            '19:50:00' => '19:50 às 20:40',
            '20:55:00' => '20:55 às 21:45',
            '21:45:00' => '21:45 às 22:35'
        ];

        $horarios = null;
        
        foreach($solicitacoes as $one) {
            $aulas = [];

            foreach ($horariosAula as $index => $key) {
                $inicio = strtotime($one->horario_inicio);
                $fim = strtotime($one->horario_inicio);
                $aula = strtotime($index);

                if ($inicio > $aula || $fim < $aula) {
                    $aulas[] = $index;
                }
            }

            $dados = $one->nome . ' ' . $one->nome_disciplina . ' ' . $one->nome_espaco;
            foreach($aulas as $hora) {
                $horarios[$hora]['hora'] = $horariosAula[$hora];
                switch ($one->dia_semana) {
                    case 1:
                        $horarios[$hora]['segunda'] = $dados;
                        break;
                    case 2:
                        $horarios[$hora]['terca'] = $dados;
                        break;
                    case 3:
                        $horarios[$hora]['quarta'] = $dados;
                        break;
                    case 4:
                        $horarios[$hora]['quinta'] = $dados;
                        break;
                    case 5:
                        $horarios[$hora]['sexta'] = $dados;
                        break;
                    case 6:
                        $horarios[$hora]['sabado'] = $dados;
                        break;
                }
            }
        }

        return $horarios;
    }

    private function filtrarSolicitacoes($id_curso, $id_espaco, $id_disciplina) {
        $solicitacoes = null;

        if ($id_disciplina && $id_espaco) {
            $solicitacoes = DB::table('solicitacaos')
                ->join('disciplinas', 'solicitacaos.id_disciplina', 'disciplinas.id')
                ->join('espacos', 'solicitacaos.id_espaco', 'espacos.id')
                ->join('users', 'solicitacaos.id_professor', 'users.id')
                ->where("users.tipo", 'professor')
                ->where('solicitacaos.id_disciplina', $id_disciplina)
                ->orWhere('solicitacaos.id_espaco', $id_espaco)
                ->orderBy('horario_inicio', 'asc')
                ->get();
        } else if ($id_curso && !$id_disciplina && !$id_espaco) {
            $solicitacoes = DB::table('solicitacaos')
                ->join('disciplinas', 'solicitacaos.id_disciplina', 'disciplinas.id')
                ->join('espacos', 'solicitacaos.id_espaco', 'espacos.id')
                ->join('users', 'solicitacaos.id_professor', 'users.id')
                ->where('solicitacaos.id_curso', $id_curso)
                ->orderBy('horario_inicio', 'asc')
                ->get();
        } else if ($id_disciplina && !$id_espaco) {
            $solicitacoes = DB::table('solicitacaos')
                ->join('disciplinas', 'solicitacaos.id_disciplina', 'disciplinas.id')
                ->join('espacos', 'solicitacaos.id_espaco', 'espacos.id')
                ->join('users', 'solicitacaos.id_professor', 'users.id')
                ->where('solicitacaos.id_disciplina', $id_disciplina)
                ->orderBy('horario_inicio', 'asc')
                ->get();
        } else if ($id_curso && !$id_disciplina && $id_espaco) {
            $solicitacoes = DB::table('solicitacaos')
                ->join('disciplinas', 'solicitacaos.id_disciplina', 'disciplinas.id')
                ->join('espacos', 'solicitacaos.id_espaco', 'espacos.id')
                ->join('users', 'solicitacaos.id_professor', 'users.id')
                ->where('solicitacaos.id_curso', $id_curso)
                ->orWhere('solicitacaos.id_espaco', $id_espaco)
                ->orderBy('horario_inicio', 'asc')
                ->get();
        } else if (!$id_curso && !$id_disciplina && $id_espaco) {
            $solicitacoes = DB::table('solicitacaos')
                ->join('disciplinas', 'solicitacaos.id_disciplina', 'disciplinas.id')
                ->join('espacos', 'solicitacaos.id_espaco', 'espacos.id')
                ->join('users', 'solicitacaos.id_professor', 'users.id')
                ->where('solicitacaos.id_espaco', $id_espaco)
                ->orderBy('horario_inicio', 'asc')
                ->get();
        }

        return $solicitacoes;
    }
}
