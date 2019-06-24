<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase {
    use DatabaseMigrations;
    
    public function test_create_user() {
        User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);
        $this->assertDatabaseHas('users', ['nome'=> 'teste']);
    }
    
    public function test_sigin_user() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get('/adm/index');
        $response->assertStatus(200);
     }
 
     public function test_servidor_privileges() {  
        $user = factory(User::class)->create();
        $urls = [
            '/adm/espacos/listar',
            '/adm/servidores/listarSolicitacoes',
            '/adm/servidores/historicoSolicitacoes', 
        ];
        foreach($urls as $url) {
            $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get($url);
            $response->assertStatus(200);
        }
     }
 
     public function test_professor_privileges() {  
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'professor',
            'password' => bcrypt(123456),
        ]);

        $urls = [
            '/adm/professores/listarMinhasSolicitacoes',
            '/adm/professores/solicitaEspaco',
        ];
        foreach($urls as $url) {
            $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get($url);
            $response->assertStatus(200);
        }
     }
 
     public function test_admin_privileges() {
        $user = User::create([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'prontuario' => 'gu123456',
            'tipo' => 'administrador',
            'password' => bcrypt(123456),
        ]);

        $urls = [
            '/adm/cursos/formularioAdicionar',
            '/adm/servidores/listarSolicitacoes',
            '/adm/disciplinas/formularioAdicionar',
            '/adm/servidores/listar',
            '/adm/professores/listar'
        ];
        foreach($urls as $url) {
            $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get($url);
            $response->assertStatus(200);
        }
     }
}
