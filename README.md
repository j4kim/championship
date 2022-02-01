# Championship

## Set up

Install project dependencies using Composer:

```
composer install
```

Copy `.env.example` (or `.env.prod-example`) to `.env`:

```
cp .env.example .env
```

(`cp` == `copy` in Windows CMD)

Complete missing variables in the `.env`.

Generate an application key:

```
php artisan key:generate
```

Configure database:
- create a `database/db.slite` file
- copy absolute path into `DB_DATABASE`
- run migrations and seeder:
  ```
  php artisan migrate --seed
  ```

Run local server:

```
php artisan serve
```

Install javascript dependencies:

```
npm install
```

Run asset compilation:

```
npm run watch
```