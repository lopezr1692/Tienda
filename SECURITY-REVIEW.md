# Informe de revisión de seguridad

**Proyecto:** Tienda  
**Fecha:** 2026-09-23  
**Alcance:** rutas Laravel, autenticación y autorización, consultas y vistas, protección CSRF, subida/descarga de archivos, configuración relevante y dependencias Composer.

## Hallazgo corregido

| # | Severidad | Archivo | Problema | Impacto | Estado |
|---|---|---|---|---|---|
| 1 | MEDIUM | `routes/web.php` | `/products` estaba declarada dos veces. La segunda definición, que prevalecía, solo usaba `auth` y anulaba el requisito `verified` de la primera. El resto del CRUD de productos también estaba dentro de un grupo protegido únicamente por `auth`. | Usuarios autenticados pero con correo no verificado podían consultar y modificar el catálogo. | Corregido |

### Cambios realizados

- Se eliminó la definición duplicada de `GET /products`.
- Se mantuvo una única ruta `products.index`, evitando la sobrescritura del nombre de ruta.
- Se agrupó todo el CRUD de productos (`GET`, `POST`, `PUT` y `DELETE`) bajo `verified`, conservando también el middleware externo `auth`.
- Se dejó el perfil protegido solo por `auth`, por lo que la verificación de correo no altera innecesariamente ese flujo.

## Validación

- `php artisan route:list --path=products -v`: las seis rutas de productos muestran `web`, `auth` y `verified`.
- `composer audit --no-interaction`: sin avisos de vulnerabilidades en las dependencias instaladas.
- `php artisan test`: 25 pruebas pasaron (61 aserciones).
- Se actualizó la expectativa de `tests/Feature/Auth/AuthenticationTest.php` para reflejar el destino real de inicio de sesión (`products.index`), sin cambiar el comportamiento de producción.

## Resultado de la revisión

No se identificaron otros problemas de seguridad de alta confianza en consultas, vistas Blade, autenticación estándar de Laravel, protección CSRF, almacenamiento de contraseñas, subida/descarga de archivos o dependencias.
