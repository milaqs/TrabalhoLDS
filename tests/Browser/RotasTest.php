<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RotasTest extends DuskTestCase {
    use DatabaseMigrations;
    
    public function test_aplicacao_online() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_redireciona() {
        $urls = [
            '/adm/cursos/formularioAdicionar',
            '/adm/servidores/listarSolicitacoes',
            '/adm/disciplinas/formularioAdicionar',
            '/adm/servidores/listar',
            '/adm/professores/listar',
            '/adm/index'
        ];
        foreach($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(302);
        }
    }
}
