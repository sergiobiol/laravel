# 🎓 Laravel Sprint 3 - CRUD d'Estudiants i Cursos

## 📝 Descripció del Projecte

Aplicació web desenvolupada amb **Laravel 12** que gestiona estudiants i cursos amb funcionalitats CRUD completes, relacions entre entitats, exportació a CSV i una API REST.

## ✨ Funcionalitats

### 🧑‍🎓 Gestió d'Estudiants
- ✅ Crear, editar, veure i eliminar estudiants
- ✅ Assignar estudiants a cursos (relació 0..1)
- ✅ Exportar tots els estudiants a CSV
- ✅ Llistat paginat amb informació del curs assignat

### 📚 Gestió de Cursos
- ✅ Crear, editar, veure i eliminar cursos
- ✅ Visualitzar estudiants matriculats en cada curs
- ✅ Exportar tots els cursos a CSV
- ✅ Exportar cursos amb els seus estudiants a CSV

### 🔗 Relacions
- Un **estudiant** pot estar en **0 o 1 curs**
- Un **curs** pot tenir **0, 1 o molts estudiants**

### 🌐 API REST
- ✅ Endpoints per Students (GET, POST, PUT, DELETE)
- ✅ Endpoints per Courses (GET, POST, PUT, DELETE)
- ✅ Respostes en format JSON
- ✅ Validació de dades

## 🛠️ Tecnologies Utilitzades

- **Framework:** Laravel 12
- **Base de dades:** SQLite / MySQL
- **Frontend:** Blade Templates + Bootstrap 5
- **API:** Laravel API Resources + Sanctum

## 📦 Instal·lació

### Requisits previs
- PHP >= 8.2
- Composer
- Node.js i NPM (opcional)

### Passos d'instal·lació

1. **Clonar el repositori**
```bash
git clone https://github.com/YOUR_USERNAME/laravel-sprint3-crud.git
cd laravel-sprint3-crud
```

2. **Instal·lar dependències**
```bash
composer install
```

3. **Configurar l'entorn**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Executar migracions**
```bash
php artisan migrate
```

5. **Carregar dades de prova** (opcional però recomanat)
```bash
php artisan db:seed
```
Això crearà 3 cursos i 6 estudiants de prova.

6. **Iniciar el servidor**
```bash
php artisan serve
```

7. **Accedir a l'aplicació**
```
Web: http://127.0.0.1:8000
Students: http://127.0.0.1:8000/students
Courses: http://127.0.0.1:8000/courses
```

## 📍 Endpoints de l'API

### Students
```
GET    /api/students          - Llistar tots
POST   /api/students          - Crear nou
GET    /api/students/{id}     - Veure un
PUT    /api/students/{id}     - Actualitzar
DELETE /api/students/{id}     - Eliminar
```

### Courses
```
GET    /api/courses           - Llistar tots
POST   /api/courses           - Crear nou
GET    /api/courses/{id}      - Veure un
PUT    /api/courses/{id}      - Actualitzar
DELETE /api/courses/{id}      - Eliminar
```

## 📖 Documentació Completa

Consulta **[API_DOCUMENTATION.md](./API_DOCUMENTATION.md)** per obtenir:
- 📋 Instruccions detallades de l'API
- 🧪 Exemples de peticions amb Postman
- 🚀 Guia pas a pas per configurar Postman
- 🐙 Com pujar el projecte a GitHub

## 👨‍💻 Autor

**Nom:** Sergi  
**Centre:** IES Montsia  
**Curs:** DAW2  

## 📧 Contacte Professor

**Email:** joaniglesias@iesmontsia.org

---

**Data:** Desembre 2025 | **Versió:** 1.0.0

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
