<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase {
    
    use DatabaseMigrations;

    public function test_login_user() {
        
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/login';
            $browser->visit($url)
            ->type('prontuario', $user->prontuario)
            ->type('password', '123456')
            ->press('Confirmar')
            ->assertPathIs('/adm/index');

        });
    }

    public function test_logout_user() {
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $this->browse(function ($browser) use ($user) {
            $url = 'http://localhost:8000/adm/index';
            $browser->visit($url)
            ->assertPathIs('/adm/index')
            ->click('a[href="http://localhost:8000/auth/logout"]')
            ->assertPathIs('/home');
        });
    }

    public function test_validacao_login() {
        $this->browse(function ($browser) {
            $url = 'http://localhost:8000/login';
            $browser->visit($url)
            ->type('prontuario', 'guNaoExiste')
            ->type('password', '123456')
            ->press('Confirmar')
            ->assertSee('Os dados inseridos são inválidos !');
        });
    }
}
