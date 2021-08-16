## Desafio Vendas

#### Tecnologias
1. Laravel 8
2. PHP 7.4
3. Composer 2.1.5
4. Node.js 14.17
6. PostgreSQL 9.6

#### Guia de instalação
1. Realizar o clone do projeto: **git clone https://github.com/borgeskelson/desafioVendas.git**.

2. Na pasta raiz do projeto executar os comandos **composer install** e **npm install** para instalar as dependências do projeto.

3. Ainda na pasta raiz do projeto, realizar uma cópia do arquivo **.env.example** para **.env** e inserir os dados de conexão ao banco de dados.

4. Executar o comando **php artisan key:generate** para gerar a chave única do projeto no arquivo **.env**.

5. Executar o comando **php artisan migrate** e **php artisan db:seed** para criar a estrutura de tabelas e dados do projeto no banco de dados.

6. Executar o comando **php artisan storage:link** para gerar o symlink da pasta storage (incluindo imagens) para a pasta public.

7. Executar o comando **php artisan serve** para rodar o projeto localmente.

8. Acessar o endereço http://localhost:8000 no navegador.
