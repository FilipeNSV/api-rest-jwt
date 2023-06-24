<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Cria um usuário e faz o login para obter o token(Com isso já testamos as duas primeiras rotas não protegidas).
     * Com o token disponível o teste na rota protegida é feito.
     * @return void
     */

    public function test_user_auth_show_api_request()
    {
        // Cria um usuário de teste
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Gera o token de acesso para o usuário
        $token = JWTAuth::fromUser($user);

        // Define os cabeçalhos da solicitação com o token de acesso
        $headers = ['Authorization' => 'Bearer ' . $token];

        // Faz a solicitação à rota protegida
        $response = $this->withHeaders($headers)->get('/api/index');

        // Verifica o status da resposta
        $response->assertStatus(200);
    }
}
