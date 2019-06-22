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
                    'nivel_curso' => 'Bacharelado',
                ],
                [
                    'nome_curso' => 'Licenciatura em Matemática',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Licenciatura',
                ],
                [
                    'nome_curso' => 'Pós-Graduação em Gestão de Sistemas de Informação',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Pós-Graduacao',
                ],
                [
                    'nome_curso' => 'Técnico em Automação Industrial',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Técnico',
                ],
                [
                    'nome_curso' => 'Técnico em Informática para Internet',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Técnico',
                ],
                [
                    'nome_curso' => 'Técnico em Manutenção e Suporte em Informática',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Técnico',
                ],
                [
                    'nome_curso' => 'Tecnologia em Análise e Desenvolvimento de Sistemas',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Tecnólogo',
                ],
                [
                    'nome_curso' => 'Tecnologia em Automação Industrial',
                    'descricao_curso' => Str::random(20),
                    'nivel_curso' => 'Tecnólogo',
                ],

            ]);
        } else {
            echo "Tabela users não esta vazia\n";
        }
    }
}
