# Sistema Halcon - Distribuidora de Materiales de Construccion

## Descripción del Proyecto
Este repositorio contiene la implementación del sistema web integral para la empresa Halcon, desarrollado como entrega final de la Evidencia 3. El sistema automatiza el seguimiento de pedidos, la gestión de roles de empleados y la consulta pública de estatus para clientes.

## Características y Funcionalidades Implementadas
- **Vista Pública de Rastreo:** Interfaz principal que exige validación dual (Número de Cliente y Número de Factura) para consultar el estatus de un pedido. Condicionada para mostrar evidencias fotográficas únicamente en estado "Delivered".
- **Panel Administrativo (Dashboard):** Interfaz centralizada con navegación fluida hacia los distintos módulos del sistema (Usuarios, Clientes, Inventario, Pedidos).
- **Control de Accesos y Roles:** Sistema de autenticación con segmentación por departamentos corporativos (Ventas, Compras, Almacén, Ruta). Incluye vistas personalizadas (Código 403) para manejo de errores de permisos.
- **Restricción de Evidencias (Regla de Negocio):** La funcionalidad para adjuntar y actualizar fotografías de carga y entrega está estrictamente limitada a los usuarios asignados al departamento de Ruta.
- **Gestión Avanzada de Órdenes:** Listado general con funcionalidad de filtrado múltiple (Factura, Número de Cliente, Fecha y Estatus).
- **Borrado Lógico (SoftDeletes):** Los pedidos eliminados conservan su integridad en la base de datos y se trasladan a un módulo de archivados, el cual permite su revisión y restauración completa al flujo activo.
- **Experiencia de Usuario (UX):** Implementación de alertas visuales de retroalimentación en tiempo real para procesos de creación, modificación, eliminación y restauración.
- **Datos de Prueba:** Integración de Seeders y Factories para generar información inicial y facilitar la evaluación del sistema de forma inmediata.

## Instrucciones de Instalación y Ejecución 

Para desplegar este proyecto en un entorno local, siga los siguientes pasos desde la terminal:

1. Clonar el repositorio localmente.
2. Acceder al directorio del proyecto e instalar las dependencias de PHP:
   `composer install`
3. Duplicar el archivo de configuración de entorno:
   `cp .env.example .env`
4. Generar la clave de la aplicación:
   `php artisan key:generate`
5. Configurar el archivo `.env` para el uso de SQLite o crear el archivo de base de datos manualmente:
   `touch database/database.sqlite`
6. Ejecutar las migraciones y poblar la base de datos con los datos de prueba:
   `php artisan migrate:fresh --seed`
7. Generar el enlace simbólico del almacenamiento público para permitir la correcta visualización de las evidencias fotográficas:
   `php artisan storage:link`
8. Iniciar el servidor local de desarrollo:
   `php artisan serve`