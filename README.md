<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
</p>

<p align="center">
  <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

# Projeto Laravel - API REST (Users)
## Este é um projeto Laravel de uma API REST de usuários. A API possui as seguintes rotas:

- POST /api/store: Rota para criar um novo usuário.
- POST /api/login: Rota para autenticar um usuário e obter o token JWT.
- GET /api/index: Rota para listar todos os usuários.
- GET /api/show/{id}: Rota para obter os detalhes de um usuário específico.

# Requisitos:

- PHP 7.4 ou superior
- Laravel 8.x
- Banco de dados MySQL
- Composer (para instalação de dependências)

# Instalação:

## Clone o repositório para o seu ambiente local:
- git clone https://github.com/FilipeNSV/api-rest-jwt.git

## Navegue até o diretório do projeto:
- cd seu-projeto

## Instale as dependências do Composer:
- composer install

## Instale a biblioteca JWT para autenticação:
- composer require tymon/jwt-auth

## Insira em config/app.php:
'providers' => [
  ...

  Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
]

## Publique as configurações do JWT:
- php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

## Crie um JWT_SECRET no .env: 
- php artisan jwt:secret

## Configure as informações do banco de dados no arquivo .env.

## Execute as migrações do banco de dados para criar a estrutura das tabelas:
- php artisan migrate

## Inicie o servidor de desenvolvimento:
- php artisan serve
- A API estará acessível em http://localhost:8000.

## Autenticação JWT
- Esta API utiliza autenticação baseada em token JWT (JSON Web Token). Para acessar as rotas protegidas, você precisa incluir o token JWT no cabeçalho da solicitação.

- Ao fazer login na rota POST /api/login, você receberá um token JWT válido. Inclua este token no cabeçalho da solicitação nas rotas protegidas da seguinte maneira:

## Documentação Swagger
- Esta API possui documentação Swagger gerada automaticamente. Para visualizar a documentação e explorar as rotas disponíveis, acesse:
- http://localhost:8000/api/documentation
- A documentação Swagger fornecerá detalhes sobre as rotas, parâmetros, tipos de resposta e outros detalhes relevantes para o consumo da API.
