# Sistema Halcón - Distribuidora de Materiales

## Cambios en esta entrega:
- **Seeders y Factories:** Se crearon datos aleatorios para probar el sistema de inmediato.
- **Vistas Básicas:** - Home pública con buscador de facturas.
  - Dashboard administrativo para gestionar órdenes.
  - Historial de pedidos archivados con opción de recuperación.
- **Lógica de Evidencia:** El sistema permite subir fotografías únicamente cuando el pedido está "En Ruta" o "Entregado".
- **Borrado Lógico:** Las órdenes eliminadas no desaparecen de la base de datos, se mueven a la sección de archivados.

## Instrucciones para el evaluador:
1. Clonar repositorio.
2. Ejecutar `composer install`.
3. Crear archivo `database/database.sqlite`.
4. Ejecutar `php artisan migrate:refresh --seed`.
5. Ejecutar `php artisan storage:link` para ver las fotos.
6. Iniciar con `php artisan serve`.