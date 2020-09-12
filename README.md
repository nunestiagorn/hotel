## Instalação

Clonar o repositório:

```sh
git clone https://github.com/nunestiagorn/hotel.git
cd hotel

```

Instalar dependências do composer:

```sh
composer install
```

Instalar dependências do npm:

```sh
npm install ou yarn install
```

Compilar assets:

```sh
npm run dev ou yarn dev
```

Configuração do env:

```sh
cp .env.example .env
```

Gerar chave da aplicação:

```sh
php artisan key:generate
```

Crie um banco de dados SQLite. Você também pode usar outro banco de dados (MySQL, Postgres), basta atualizar sua configuração de acordo.

```sh
touch database/database.sqlite
```

Rodar migrations:

```sh
php artisan migrate
```

Rodar seeders:

```sh
php artisan db:seed
```

Iniciar aplicação:

```sh
php artisan serve
```

Visite a aplicação no navegador e pode ser feito o login no painel admistrativo com o usuario:

- **Email:** admin@admin.com
- **Senha:** password