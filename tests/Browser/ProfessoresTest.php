<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ProfessoresTest extends DuskTestCase {  
    
    use DatabaseMigrations;

    public function test_formulario_add_professor() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/login';
            $url_form = 'http://localhost:8000/adm/professores/formularioAdicionar';
            $browser->visit($url)
            ->type('prontuario', $user->prontuario)
            ->type('password', '123456')
            ->press('Confirmar')
            ->visit($url_form)
            ->type('nome', 'testando')
            ->type('prontuario', 'gu10xxx')
            ->type('email', 'testando@aa.com')
            ->press('Cadastrar');

            $this->assertDatabaseHas('users', [
                'email' => 'testando@aa.com'
            ]);
        });
    }

    public function test_formulario_edit_professor() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/adm/professores/formularioAtualizar/1';
            $browser->visit($url)
            ->clear('nome')
            ->type('nome', 'editou com sucesso!')
            ->press('Cadastrar');

            $this->assertDatabaseHas('users', [
                'nome' => 'editou com sucesso!'
            ]);
        });
    }

    public function test_deleta_professor() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/adm/professores/deletar/1';
            $browser->visit($url);
            
            $this->assertDatabaseMissing('users', [
                'email' => 'teste@teste.com'
            ]);
        });
    }
}
