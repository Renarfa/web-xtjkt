# AGENTS.md

## Quick start
- `composer setup` — full project setup (install deps, copy .env, generate key, migrate, npm build)
- `composer dev` — starts dev servers (php artisan serve + queue:listen + npm run dev via concurrently)
- `composer test` — runs `php artisan config:clear` then `php artisan test` (PHPUnit)
- `npm run build` — Vite production build
- `npm run dev` — Vite dev server with HMR

## Project structure
- Fresh **Laravel 13** app (PHP 8.3+, SQLite, Vite + Tailwind CSS 4)
- No custom controllers/models yet — only stock Laravel (User model, welcome route)
- Session/cache/queue all default to `database` driver (requires running migrations)
- `database/database.sqlite` already exists; migrations are stock Laravel (users, cache, jobs tables)
- APP_KEY is already set in `.env`

## Testing
- `composer test` (preferred) runs `config:clear` first, then `php artisan test`
- Tests use in-memory SQLite (`:memory:`) — no external DB needed
- Test suites: `tests/Unit` (plain PHPUnit) and `tests/Feature` (Laravel HTTP tests)
- Single test: `php artisan test --filter test_name` or `vendor/bin/phpunit tests/Feature/ExampleTest.php`

## Code style
- Laravel Pint (`vendor/bin/pint`) for PHP CS fixes — run `./vendor/bin/pint` before committing
- PSR-4 autoloading: `App\` → `app/`, `Database\Factories\` → `database/factories/`, `Tests\` → `tests/`
- PHP 8.3+ with typed properties, attributes (e.g., `#[Fillable]` on models)
- EditorConfig: 4-space indent, UTF-8, LF line endings

## Artisan shortcuts
- `php artisan make:model ModelName -mf` — model + migration + factory
- `php artisan make:controller Admin/DashboardController` — controller with subdirectory
- `php artisan migrate` — run pending migrations
- `php artisan make:test NameTest` — creates Feature test; add `--unit` for Unit test

## Routes
- `routes/web.php` — web routes (only `/` → welcome view)
- `routes/console.php` — Artisan commands (only `inspire`)
- Health check at `/up`

## Tooling
- Composer: Laravel 13, phpunit 12, pint 1.x, fakerphp, mockery, collision
- Node: Vite 8, laravel-vite-plugin 3.x, tailwindcss 4.x, concurrently 9.x
