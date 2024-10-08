# Sistema Backend CRUD de Veículos

Este é um sistema backend para gerenciamento de veículos, construído com Laravel 9 e PHP 8.0. O sistema fornece operações CRUD (Criar, Ler, Atualizar e Deletar) para veículos.

## Requisitos 
    - PHP 8.0 ou superior
    - Laravel 9
    - Composer
    - MySQL 5.8

## Instalação
    
        git clone https://github.com/JoseAfonso15/crud-veiculo-backend.git
        cd crud-veiculo-backend

## Instale as Dependências:
     composer install

## Configure o Arquivo .env:
     cp .env.example .env

Gere a Chave de Aplicação:
    - php artisan key:generate

## Execute as Migrações e Seeders:
     php artisan migrate
     php artisan db:seed --class=VeiculoSeeder

## Documentação Swagger
    A documentação da API está disponível no formato Swagger YAML. O arquivo swagger.yaml fornece uma descrição completa da API, incluindo todos os endpoints   detalhes sobre os modelos de dados.
    Localização do arquivo Swagger: /storage/api-docs/swagger.yaml
    Para visualizar a documentação Swagger, você pode usar ferramentas como Swagger Editor ou Swagger UI em https://editor.swagger.io.