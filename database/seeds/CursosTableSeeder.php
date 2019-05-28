<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if(DB::table('cursos')->get()->count() == 0){
            DB::table('cursos')->insert([
                [
                    'nome_curso' => 'Engenharia de Controle e Automação',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'bacharelado',
                ],
                [
                    'nome_curso' => 'Licenciatura em Matemática',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'licenciatura',
                ],
                [
                    'nome_curso' => 'Pós-Graduação em Gestão de Sistemas de Informação',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'posGraduacao',
                ],
                [
                    'nome_curso' => 'Técnico em Automação Industrial',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'tecnico',
                ],
                [
                    'nome_curso' => 'Técnico em Informática para Internet',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'tecnico',
                ],
                [
                    'nome_curso' => 'Técnico em Manutenção e Suporte em Informática',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'tecnico',
                ],
                [
                    'nome_curso' => 'Tecnologia em Análise e Desenvolvimento de Sistemas',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'tecnologo',
                ],
                [
                    'nome_curso' => 'Tecnologia em Automação Industrial',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'tecnologo',
                ],

            ]);
        } else {
            echo "Tabela users não esta vazia\n";
        }
    }
}
