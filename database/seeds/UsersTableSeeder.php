<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if(DB::table('users')->get()->count() == 0){
            DB::table('users')->insert([
                [
                    'prontuario' => 'guxxx',
                    'nome' => 'Administrador',
                    'email' => Str::random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'tipo' => 'administrador',
                ],
                [
                    'prontuario' => 'gu100',
                    'nome' => 'Servidor',
                    'email' => Str::random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'tipo' => 'servidor',
                ],
                [
                    'prontuario' => 'gu200',
                    'nome' => 'Professor',
                    'email' => Str::random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'tipo' => 'professor',
                ],

            ]);
        } else {
            echo "Tabela users não esta vazia\n";
        }
    }
}
