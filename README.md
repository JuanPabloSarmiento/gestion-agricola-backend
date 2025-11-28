<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).





Gestión Agrícola API (Laravel + Docker)

API REST backend-only para gestionar usuarios, cultivos, animales y generar reportes PDF.

Dockerizado para desarrollo rápido y consistente.

🐳 Requisitos

Docker y Docker Compose

PHP >= 8.1

Composer

Postman o cualquier cliente HTTP

⚙️ Levantar el proyecto con Docker

Clonar el repositorio y entrar en la carpeta:

git clone <URL_REPO>
cd <REPO>


Construir y levantar contenedores:

docker-compose up -d --build


Ver contenedores activos:

docker ps


Acceder al contenedor de la app:

docker exec -it <nombre_contenedor_app> bash


Instalar dependencias dentro del contenedor:

composer install


Migrar y sembrar la base de datos:

php artisan migrate
php artisan db:seed


Arrancar servidor Laravel dentro del contenedor:

php artisan serve --host=0.0.0.0 --port=8000


Desde fuera del contenedor, la API estará disponible en http://localhost:8000

🗄️ Acceder a la base de datos

Entrar al contenedor de la base de datos:

docker exec -it <nombre_contenedor_db> bash


Conectarse a MySQL (ejemplo):

mysql -u root -p


Listar bases de datos:

SHOW DATABASES;


Usar la base de datos de la app:

USE gestion_agricola;


Listar tablas:

SHOW TABLES;

🔑 Autenticación

Se usa Sanctum con tokens personales.

Headers obligatorios para endpoints protegidos:

Authorization: Bearer <TOKEN>
Accept: application/json

📦 Endpoints públicos
Método	Endpoint	Descripción	Body / Params
POST	/api/register	Registrar un usuario	name, email, password
POST	/api/login	Login de usuario	email, password

Ejemplo de respuesta login/register:

{
    "message": "Login correcto",
    "token": "2|448yu4WsFJ00ter8RiLDCq9Lf3VP0qNf8b2f4kKdd6a93d64"
}

🔒 Endpoints protegidos (requieren token Bearer)
Usuario actual
Método	Endpoint	Descripción
GET	/api/user	Obtener usuario logueado
POST	/api/logout	Cerrar sesión (elimina token actual)
CRUD Cultivos
Método	Endpoint	Descripción	Body / Params
GET	/api/cultivos	Listar todos los cultivos	—
POST	/api/cultivos	Crear un nuevo cultivo	nombre (string, requerido)
tipo (string, opcional)
fecha_siembra (date, requerido)
estado (string, opcional)
GET	/api/cultivos/{id}	Ver un cultivo específico	id del cultivo
PUT	/api/cultivos/{id}	Actualizar un cultivo	nombre, tipo, fecha_siembra, estado (opcionales)
DELETE	/api/cultivos/{id}	Eliminar un cultivo	id del cultivo
CRUD Animales
Método	Endpoint	Descripción	Body / Params
GET	/api/animales	Listar todos los animales	—
POST	/api/animales	Crear un nuevo animal	Depende del request validado (StoreAnimalRequest)
GET	/api/animales/{id}	Ver un animal específico	id del animal
PUT	/api/animales/{id}	Actualizar un animal	Depende del request validado (UpdateAnimalRequest)
DELETE	/api/animales/{id}	Eliminar un animal	id del animal
Reportes PDF
Método	Endpoint	Descripción	Headers obligatorios
GET	/api/reportes/cultivos	Generar PDF con listado de cultivos	Authorization: Bearer <TOKEN>
Accept: application/pdf
GET	/api/reportes/animales	Generar PDF con listado de animales	Authorization: Bearer <TOKEN>
Accept: application/pdf
📝 Ejemplo de flujo completo (Postman)

Registrar usuario

POST /api/register

Body: { "name": "Juan", "email": "juan@example.com", "password": "123456" }

Login

POST /api/login

Body: { "email": "juan@example.com", "password": "123456" }

Guardar token generado

Obtener usuario

GET /api/user

Headers: Authorization: Bearer <TOKEN>

CRUD de cultivos / animales

Usar endpoints protegidos con token Bearer

Generar reportes PDF

GET /api/reportes/cultivos o /api/reportes/animales

Headers: Authorization: Bearer <TOKEN> + Accept: application/pdf

📝 Comandos útiles de Laravel / Docker

Dentro del contenedor app:

# Listar rutas y métodos
php artisan route:list

# Migrar base de datos
php artisan migrate

# Sembrar datos
php artisan db:seed

# Crear controlador
php artisan make:controller <NombreController> --api

# Crear modelo con migración
php artisan make:model <NombreModelo> -m

# Crear request para validación
php artisan make:request <NombreRequest>

💡 Notas

Todos los endpoints protegidos requieren token Bearer de Sanctum.

La API está preparada solo para backend y no tiene frontend.

Validación de datos implementada en controladores y Requests.

Docker facilita levantar el proyecto y la base de datos sin configuraciones locales complejas.

Las rutas y controladores principales:

AuthController → login/register/logout/user

CultivoController → CRUD cultivos

AnimalController → CRUD animales

ReportController → PDF de cultivos y animales

POST    /api/register
POST    /api/login
GET     /api/animales
POST    /api/animales
GET     /api/cultivos
POST    /api/cultivos
POST    /api/cultivos/{id}/insumos
GET     /api/reportes/cultivo

server docker: php artisan serve --host=0.0.0.0 --port=8000
acceder: docker compose exec app bash