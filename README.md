# 🚀 Generador APA7: Laravel + Docker

Este repositorio contiene el entorno de desarrollo contenedorizado y optimizado para el
proyecto Generador-APA7 (Inscripciones ICO). La arquitectura está basada en microservicios
independientes e intercomunicados mediante la red interna de Docker, garantizando un entorno
de desarrollo robusto, seguro y escalable.

## 🏗 Stack Tecnológico y Puertos

```
Aplicación (Engine): PHP 8.3-FPM (inscripcionesico_app)
Servidor Web: Nginx Alpine (inscripcionesico_nginx) — Puerto Host: 8080
Base de Datos: MySQL 8.4 (inscripcionesico_db) — Puerto Host: 3306
Frontend Compiler: Vite + Tailwind CSS — Puerto Host: 5173
```
## 🛠 Requisitos Previos

```
Docker Desktop o Docker Engine
Docker Compose V
```
## 🏁 Configuración Inicial

Sigue estos pasos para inicializar el entorno de desarrollo desde cero de manera segura:

1. Clonar el Repositorio

```
git clone [https://github.com/EderAJ30/GENERADOR-APA7.git](https://github.com/Ede
cd GENERADOR-APA
```
2. Preparar el Archivo de Entorno

Copia la plantilla de configuración de entorno base antes de levantar los contenedores:

```
cp .env.example .env
```
```
⚠ Nota de Mantenibilidad: Asegúrate de que tu .env tenga configurados
correctamente los hosts y credenciales de la base de datos para la red interna de
Docker:
```

```
DB_CONNECTION=mysql
DB_HOST=db (o inscripcionesico_db )
DB_PORT=
DB_DATABASE=referenciasico
DB_USERNAME=eder
DB_PASSWORD=
```
3. Despliegue de Contenedores

Construye las imágenes personalizadas y levanta los servicios en segundo plano:

```
docker compose up -d --build
```
4. Inicialización de la Aplicación Laravel

Ejecuta las dependencias de Composer, genera la llave de cifrado de la aplicación y asigna los
permisos adecuados en el contenedor de la aplicación:

```
# Instalación de dependencias de Composer
docker compose exec app composer install
# Generación de la APP_KEY de seguridad
docker compose exec app php artisan key:generate
```
5. Migraciones de Base de Datos y Seeders

Crea la estructura de base de datos con datos semilla de prueba:

```
docker compose exec app php artisan migrate:fresh --seed
```
6. Compilación de Assets (Frontend con Vite)

Instala los módulos de Node y levanta el servidor de desarrollo para Hot Module Replacement
(HMR):

```
docker compose exec app npm install
docker compose exec app npm run dev
```

```
Acceso a la Aplicación: > - Web Server (Nginx): http://localhost:
Servidor de desarrollo Vite: http://localhost:
```
## 💾 Gestión de Base de Datos

Acceso Directo (CLI)

Para interactuar de forma directa con la terminal de MySQL en el contenedor de base de datos
utilizando el usuario configurado:

```
docker compose exec inscripcionesico_db -u eder -p1234 inscripciones
```
Comandos de Ingeniería Inversa

Generación automática de modelos Eloquent basados en tablas físicas existentes (útil para
refactorizaciones rápidas):

```
docker compose exec app php artisan code:models --table=usuarios
```
## ⚡ Configuración de Vite para Docker (Tip de Ingeniería)

Para que el Hot Module Replacement (HMR) funcione correctamente a través del puerto
mapeado 5173 hacia tu máquina local, tu archivo vite.config.js debe estar configurado
para escuchar en todas las interfaces de red (0.0.0.0) y especificar el puerto del cliente:

```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
export default defineConfig({
plugins: [
laravel({
input: ['resources/css/app.css', 'resources/js/app.js'],
refresh: true,
}),
],
server: {
host: '0.0.0.0',
hmr: {
host: 'localhost',
},
port: 5173,
watch: {
usePolling: true,
},
```

```
},
});
```
## 🔧 Mantenimiento y Troubleshooting

Reinicio Completo del Entorno

Si realizas cambios estructurales en los archivos Docker, puedes realizar un reset limpio
destruyendo los volúmenes de datos temporales:

```
docker compose down -v
docker compose up -d
```
Depuración Completa de Caché

En caso de inconsistencias con las rutas, configuraciones o vistas tras un despliegue, ejecuta
de forma segura el limpiador de caché unificado:

```
docker compose exec app php artisan optimize:clear
docker compose exec app composer dump-autoload
```
Error: Vite Manifest Not Found

Si la aplicación en el navegador reporta un error de manifiesto faltante en entornos simulados
de producción:

```
docker compose exec app npm run build
```

