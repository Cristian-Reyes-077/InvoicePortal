# InvoicePortal

Aplicación Laravel para que clientes puedan subir facturas, ver su estado y que el proveedor registre pagos y comprobantes. Soporte para PDF, MySQL y almacenamiento en S3. Incluye una pantalla de inicio de sesión sencilla para acceder al sistema.

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
