# Sistema de Cadastro de Automóveis

Aplicação web em **Laravel** para CRUD de automóveis, com relacionamento a montadoras, validações e interface em Blade + Bootstrap.

## Requisitos

- **PHP** 8.2+
- **Composer** 2.x
- **MySQL** ou **MariaDB**
- **Node.js** e **npm** (opcional, para assets)

## Tecnologias

- Laravel 12
- PHP 8.2
- MySQL / MariaDB
- Blade templates
- Bootstrap 5
- Repository pattern + Form Request

## Estrutura do banco

- **montadoras**: id, nome, timestamps  
- **automoveis**: id, nome, placa, chassi (único), montadora_id (FK), timestamps  

Relacionamento: uma montadora possui muitos automóveis; um automóvel pertence a uma montadora.

## Instalação

### 1. Clonar e instalar dependências

```bash
git clone <url-do-repositorio> desafio
cd desafio/laravel
composer install
```

### 2. Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Edite o `.env` e configure o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 3. Criar o banco e rodar migrations

Crie o banco no MySQL/MariaDB (se ainda não existir):

```sql
CREATE DATABASE nome_do_banco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Depois execute:

```bash
php artisan migrate
```

### 4. Popular montadoras (opcional)

```bash
php artisan db:seed
```

Isso insere as montadoras: Volkswagen, Ford, Fiat e Chevrolet.

### 5. Subir o servidor

```bash
php artisan serve
```

Acesse: **http://localhost:8000** (a raiz redireciona para a listagem de automóveis).

## Rotas

| Método | URI | Nome | Descrição |
|--------|-----|------|-----------|
| GET | `/` | — | Redireciona para listagem de automóveis |
| GET | `/automovel` | automovel.index | Listagem (com busca por nome) |
| GET | `/automovel/create` | automovel.create | Formulário de cadastro |
| POST | `/automovel` | automovel.store | Salvar novo automóvel |
| GET | `/automovel/{id}` | automovel.show | Ver detalhes + montadora |
| GET | `/automovel/{id}/edit` | automovel.edit | Formulário de edição |
| PUT | `/automovel/{id}` | automovel.update | Atualizar automóvel |
| DELETE | `/automovel/{id}` | automovel.destroy | Excluir automóvel |

## Validações

- **nome**: obrigatório  
- **placa**: obrigatória; formato antigo (XXX0000) ou Mercosul (XXX0X00)  
- **chassi**: obrigatório e único  
- **montadora**: obrigatória (exists em `montadoras`)

## Estrutura do projeto

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AutomovelController.php
│   └── Requests/
│       └── AutomovelRequest.php
├── Models/
│   ├── Automovel.php
│   └── Montadora.php
├── Repositories/
│   ├── AutomovelRepository.php
│   └── contracts/
│       └── AutomovelRepositoryInterface.php
└── Rules/
    └── PlacaValidation.php

database/
├── migrations/
│   └── 2026_02_28_113506_create_table_automovel_montadora.php
└── seeders/
    ├── DatabaseSeeder.php
    └── MontadoraSeeder.php

resources/views/
├── layouts/
│   ├── app.blade.php
│   └── alerts.blade.php
├── automoveis/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── pagination/
    └── pages.blade.php
```

## Licença

MIT.
