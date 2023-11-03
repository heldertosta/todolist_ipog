# TODO LIST 

Instruções para execução do Projeto

- Pré Requisitos
    - Docker ou Docker Desktop par usuários do Windows
    - NodeJS 18+ LTS
    - PHP 8.1+
    - Composer
    - Angular CLI

1 - INSTALACÃO DO BANCO DE DADOS
    * Neste projeto o banco de dados utilizado é o PostgreSQL e não será necessária a instalação localmente, vamos utilizar o conceito de container e para iniciar o banco precisamos apenas alterar os campos do arquivo .env e com o Docker instalado executar o comando abaixo:
        - docker-compose up -d --build

    * A imagem do Postgres será baixada e um container será criado. Após a execução basta acessar o banco de dados com o cliente desejado de acordo com as configurações do arquivo .env e criar o banco de dados para a aplicação com o nome desejado.

2 - API PHP 
    * Antes de iniciar a o servidor responsável pela nossa API é necessário instalar as dependências com o comando abaixo estando dentro do diretório ./api: 
        - composer install 
    * Para criar as tabelas do banco de dados devemos executar os dois comandos abaixo para rodas as migrations
        - php artisan migrate:install
        - php artisan migrate
    * Após instalar as dependências e ainda no diretório ./api basta iniciar o servidor com o comando abaixo:
        - php artisan serve

3 - Fronted 
    * Assim como na nossa API é necessário primeiro instalar as dependências. Primeiro vamos instalar globalmente a interface de linha de comando do Angular.
        - npm install -g @angular/cli
    * Após a instalação certifique-se de estar dentro do diretório ./app para que possamos instalar as dependências da nossa aplicação e execute o comando: 
        - npm install 
    * Depois de instalar todas as dependências basta executar o servidor com o seguinte comando:
        - ng serve

A documentação da API utilizando o Swagger já está disponível ao executar o servidor no endereço: http://localhost:8000/api-documentation