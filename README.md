# Biblioteca de Livros - Laravel

Este é um projeto de gestão de livros e autores, construído com o framework Laravel. A aplicação permite que os usuários gerenciem livros, autores e suas respectivas informações.

## Requisitos

- PHP 8.2 ou superior
- Composer
- Laravel
- Node.js

## Funcionalidades
- Gerenciar Livros: Adicionar, editar, excluir e listar livros.
- Gerenciar Autores: Adicionar, editar e excluir autores.
- Pesquisa: Pesquisar livros por título ou autor.
- Página de Login e Registro: Sistema de autenticação para acesso ao painel de controle.

## Como rodar o projeto baixado

### 1. Baixar o Repositório

```bash
git clone https://github.com/Lorenagoldner/biblioteca_php.git
cd biblioteca_php.git 
```

### 2. Instalar as dependendências do PHP

```bash
- composer install
```

### 3. Configurar o ambiente

- Abra o arquivo .env e configure as credenciais do banco de dados, como o nome do banco de dados, usuário e senha:

```bash
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=seubanco
- DB_USERNAME=seuusuario
- DB_PASSWORD=suasenha
```

### 4.Rodar as Migrações

Execute o comando abaixo para   configurar o banco de dados com as tabelas necessárias

```bash
- php artisan migrate
```

## Iniciar serviços no terminal:

```bash
- php artisan serve
- npm run dev
```

### Acesso à ferramenta: 

```bash
http://localhost:8000
```



