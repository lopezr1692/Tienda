# Informe de migración a Laravel 13

**Fecha:** 2026-09-23

## Resumen

La aplicación se actualizó de Laravel 12.67.0 a Laravel 13.33.0. Composer resolvió las dependencias correctamente y la suite completa pasó sin incompatibilidades de código.

## Dependencias directas

| Paquete | Antes | Después | Resultado |
|---|---:|---:|---|
| `laravel/framework` | `v12.67.0` | `v13.33.0` | Actualizado |
| `laravel/tinker` | `v2.11.1` | `v3.0.2` | Actualizado por compatibilidad con Laravel 13 |
| `laravel/pint` | `v1.30.5` | `v1.32.1` | Actualizado por Composer |
| `laravel/sail` | `v1.67.0` | `v1.68.0` | Actualizado por Composer |
| `laravel/breeze` | `v2.4.2` | `v2.4.2` | Sin cambios; compatible |
| `laravel/ui` | `v4.6.3` | `v4.6.3` | Sin cambios; compatible |
| `nunomaduro/collision` | `v8.9.5` | `v8.9.5` | Sin cambios; compatible |
| `phpunit/phpunit` | `11.5.56` | `11.5.56` | Sin cambios; compatible |

La restricción de PHP se actualizó de `^8.2` a `^8.3`. El entorno utilizado tiene PHP 8.5.6.

## Dependencias transitivas relevantes actualizadas

Composer informó 43 actualizaciones, 2 instalaciones y 2 eliminaciones. Entre las actualizaciones relevantes se encuentran:

- Symfony 7.4 a Symfony 8.1 en los componentes utilizados por Laravel.
- Guzzle 7.15 a 8.2.
- Carbon 3.13 a 3.14.
- Monolog 3.10 a 3.12.
- Flysystem 3.35 a 3.36.
- `laravel/prompts` 0.3.23 a 0.3.24.
- `laravel/serializable-closure` 2.0.15 a 2.1.0.

## Cambios realizados

- `composer.json`
  - PHP: `^8.2` → `^8.3`.
  - Laravel Framework: `^12.0` → `^13.0`.
  - Laravel Tinker: `^2.10` → `^3.0`.
- `composer.lock`
  - Regenerado mediante `composer update -W --no-interaction`.
- No se modificaron rutas, controladores, vistas, CRUD, middleware ni datos de la aplicación.

## Incompatibilidades

No se detectaron incompatibilidades de código durante la migración. Las rutas y la aplicación arrancaron correctamente con Laravel 13.

## Validaciones ejecutadas

- `composer validate --no-check-publish --no-interaction`: correcto.
- `composer check-platform-reqs --no-interaction`: correcto.
- `php artisan route:list`: correcto; 27 rutas registradas.
- `DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan test`: correcto.
- Resultado de pruebas: 29 pruebas, 75 aserciones, 0 fallos.

Las pruebas se ejecutaron con SQLite en memoria. No se ejecutaron `migrate:fresh`, `db:wipe`, `migrate:refresh`, truncados, seeders destructivos ni operaciones de escritura contra `database/database.sqlite`.

## Datos de desarrollo

Se consultó `database/database.sqlite` únicamente en modo lectura antes y después de la validación:

```text
admin_count_before=1
admin_count_after=1
```

El usuario `admin@tienda.test` sigue existiendo.

