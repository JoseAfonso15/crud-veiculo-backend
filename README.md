Sistema Backend CRUD de Veículos
Este é um sistema backend para gerenciamento de veículos, construído com Laravel 9 e PHP 8.0. O sistema fornece operações CRUD (Criar, Ler, Atualizar e Deletar) para veículos.

Requisitos
PHP 8.0 ou superior
Laravel 9
Composer
MySQL ou outro banco de dados suportado pelo Laravel
Instalação
Clone o repositório:

 
Copiar código
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
Instale as dependências:


Copiar código
composer install
Configure o arquivo .env:

Copie o arquivo .env.example para .env e configure as variáveis de ambiente, incluindo as configurações do banco de dados.


Copiar código
cp .env.example .env
Gere a chave de aplicação:


Copiar código
php artisan key:generate
Execute as migrações e seeders:


Copiar código
php artisan migrate
php artisan db:seed
Endpoints da API
Listar Veículos
URL: /veiculos
Método: GET
Descrição: Lista todos os veículos.
Respostas:
200 OK - Retorna a lista de veículos.
Criar Veículo
URL: /veiculos
Método: POST
Descrição: Cria um novo veículo.
Request Body:
json
Copiar código
{
  "placa": "ABC1234",
  "chassi": "12345678901234567",
  "renavam": "12345678901",
  "modelo": "Fusca",
  "marca": "Volkswagen",
  "ano": 1970
}
Respostas:
201 Created - Veículo criado com sucesso.
422 Unprocessable Entity - Dados inválidos.
Mostrar Veículo
URL: /veiculos/{id}
Método: GET
Descrição: Mostra um veículo específico.
Parâmetros:
id (integer) - ID do veículo.
Respostas:
200 OK - Retorna o veículo.
404 Not Found - Veículo não encontrado.
Atualizar Veículo
URL: /veiculos/{id}
Método: PUT
Descrição: Atualiza um veículo existente.
Parâmetros:
id (integer) - ID do veículo.
Request Body:
json
Copiar código
{
  "placa": "XYZ5678",
  "chassi": "98765432109876543",
  "renavam": "10987654321",
  "modelo": "Gol",
  "marca": "Volkswagen",
  "ano": 2020
}
Respostas:
200 OK - Veículo atualizado com sucesso.
422 Unprocessable Entity - Dados inválidos.
Deletar Veículo
URL: /veiculos/{id}
Método: DELETE
Descrição: Remove um veículo.
Parâmetros:
id (integer) - ID do veículo.
Respostas:
200 OK - Veículo deletado com sucesso.
500 Internal Server Error - Erro ao processar a solicitação.
Seeder de Dados
Um seeder está disponível para criar dados de exemplo para veículos usando a biblioteca Faker.

Comando para rodar o seeder:


Copiar código
php artisan db:seed --class=VeiculoSeeder
Isso irá gerar 20 veículos com dados fictícios no banco de dados.

Documentação Swagger
A documentação da API está disponível no formato Swagger YAML. O arquivo swagger.yaml fornece uma descrição completa da API, incluindo todos os endpoints e detalhes sobre os modelos de dados.

Localização do arquivo Swagger:
swagger.yaml - Localizado na raiz do projeto.
Para visualizar a documentação Swagger, você pode usar ferramentas como Swagger Editor ou Swagger UI.