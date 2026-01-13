# Laravel Sprint 3 - CRUD Estudiants i Cursos

## Descripció

Aplicació web desenvolupada amb Laravel 12 que gestiona estudiants i cursos. Inclou funcionalitats CRUD completes, relacions entre entitats, exportació a CSV i una API REST per provar amb Postman.

## Funcionalitats

### Gestió d'Estudiants
- Crear, editar, veure i eliminar estudiants
- Assignar estudiants a cursos (un estudiant pot estar en 0 o 1 curs)
- Exportar tots els estudiants a CSV
- Llistat paginat amb informació del curs assignat

### Gestió de Cursos
- Crear, editar, veure i eliminar cursos
- Visualitzar estudiants matriculats en cada curs
- Exportar tots els cursos a CSV
- Exportar cursos amb els seus estudiants a CSV

### Relacions
- Un estudiant pot estar en 0 o 1 curs
- Un curs pot tenir 0, 1 o molts estudiants

### API REST
- Endpoints per Students (GET, POST, PUT, DELETE)
- Endpoints per Courses (GET, POST, PUT, DELETE)
- Respostes en format JSON
- Validació de dades

## Tecnologies

- Framework: Laravel 12
- Base de dades: SQLite
- Frontend: Blade Templates + Bootstrap 5
- API: Laravel Sanctum

## Instal·lació

### Requisits
- PHP 8.2 o superior
- Composer

### Passos

1. Clonar el repositori
```bash
git clone https://github.com/sergiobiol/laravel.git
cd laravel
```

2. Instal·lar dependències
```bash
composer install
```

3. Configurar l'entorn
```bash
cp .env.example .env
php artisan key:generate
```

4. Executar migracions
```bash
php artisan migrate
```

5. Carregar dades de prova (opcional)
```bash
php artisan db:seed
```

6. Iniciar el servidor
```bash
php artisan serve
```

7. Accedir a l'aplicació
- Web: http://127.0.0.1:8000
- Login: http://127.0.0.1:8000/login
- Register: http://127.0.0.1:8000/register

## Autenticació

### Web
L'aplicació requereix autenticació per accedir a Students i Courses. 

1. Registra't: http://127.0.0.1:8000/register
2. O inicia sessió: http://127.0.0.1:8000/login

### API
L'API utilitza Laravel Sanctum amb autenticació per token Bearer.

1. Obtenir token:
```
POST /api/login
Body: { "email": "user@example.com", "password": "password" }
```

2. Utilitzar el token en totes les peticions:
```
Authorization: Bearer {token}
```

## API REST

**Important:** Tots els endpoints requereixen autenticació amb token Bearer.

### Endpoints Students
```
GET    /api/students          - Llistar tots
POST   /api/students          - Crear nou
GET    /api/students/{id}     - Veure un
PUT    /api/students/{id}     - Actualitzar
DELETE /api/students/{id}     - Eliminar
```

### Endpoints Courses
```
GET    /api/courses           - Llistar tots
POST   /api/courses           - Crear nou
GET    /api/courses/{id}      - Veure un
PUT    /api/courses/{id}      - Actualitzar
DELETE /api/courses/{id}      - Eliminar
```

## Postman

Per provar l'API amb Postman, pots accedir al workspace compartit:

https://app.getpostman.com/join-team?invite_code=5779cc5ba97d14ab737794403338583c16b49e51cc10e9f32df300fac0b454dc&target_code=adb02292ff3875ce402dd4fd505146c9

## Documentació

Consulta els fitxers de documentació per més informació:
- API_DOCUMENTATION.md - Instruccions detallades de l'API
- POSTMAN_EXAMPLES.md - Exemples de peticions
- TEST_DATA.md - Dades de prova

## Autor

Sergi Obiol
IES Montsia - DAW2
Desembre 2025


