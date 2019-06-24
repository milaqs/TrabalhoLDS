<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Espaco;

class EspacosTest extends DuskTestCase {  
    
    use DatabaseMigrations;

    public function test_formulario_add_espaco() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/login';
            $url_form = 'http://localhost:8000/adm/espacos/formularioAdicionar';
            $browser->visit($url)
            ->type('prontuario', $user->prontuario)
            ->type('password', '123456')
            ->press('Confirmar')
            ->visit($url_form)
            ->type('nome_espaco', 'Quadra')
            ->type('descricao_espaco', 'Quadra de esportes')
            ->type('capacidade_espaco', '50')
            ->check("input[name='acessibilidade']")
            ->press('Cadastrar');

            $this->assertDatabaseHas('espacos', [
                'nome_espaco' => 'Quadra',
                'descricao_espaco' => 'Quadra de esportes'
            ]);
        });
    }

    public function test_formulario_edit_espaco() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        Espaco::create([
            'nome_espaco' => 'Quadra',
            'capacidade_espaco' => 50,
            'descricao_espaco' => 'Quadra de esportes',
            'acessibilidade' => '1',
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/adm/espacos/formularioAtualizar/1';
            $browser->visit($url)
            ->clear('nome_espaco')
            ->clear('descricao_espaco')
            ->clear('capacidade_espaco')
            ->type('nome_espaco', 'Novo espaço!')
            ->type('descricao_espaco', 'Descriação nova do espaço!')
            ->type('capacidade_espaco', 100)
            ->press('Cadastrar');

            $this->assertDatabaseHas('espacos', [
                'nome_espaco' => 'Novo espaço!',
                'descricao_espaco' => 'Descriação nova do espaço!'
            ]);
        });
    }

    public function test_deleta_servidor() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        Espaco::create([
            'nome_espaco' => 'Quadra',
            'capacidade_espaco' => 50,
            'descricao_espaco' => 'Quadra de esportes',
            'acessibilidade' => '1',
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/adm/espacos/deletar/1';
            $browser->visit($url);
            
            $this->assertDatabaseMissing('espacos', [
                'nome_espaco' => 'Quadra',
                'descricao_espaco' => 'Quadra de esportes'
            ]);
        });
    }
}
