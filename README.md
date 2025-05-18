# E-learning Management System API

This is an API for an e-learning management system implemented with the laravel PHP framework. There are 3 entities inside the database:

1. Students
2. Courses
3. Enrolments/Completions

## Database schema
![alt text](ER_diagram.png)

# Get Started

# 🚀 Laravel RESTful API with Sail + PostgreSQL

This project is a simple Laravel REST API using [Laravel Sail](https://laravel.com/docs/sail), the official Laravel Docker development environment. It includes PostgreSQL, and is ready to get up and running with minimal setup.

---

## 🛠 Requirements

- [Docker Desktop](https://www.docker.com/products/docker-desktop) installed and running
- Git
- Optional: [Composer](https://getcomposer.org/) if you're managing dependencies manually

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

### 2. Copy the `.env` file

```bash
cp .env.example .env
```

### 3. Start Laravel Sail (Docker)

Install Sail if not installed yet (optional):

```bash
composer install
```
Make an alias to simplify commands
```bash
echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc
source ~/.bashrc
```
Start the app:

```bash
sail up -d
```

If you get a permission error, try:

```bash
chmod +x vendor/bin/sail
```

---

### 4. Generate App Key

```bash
./vendor/bin/sail artisan key:generate
```

---

### 5. Configure the Database

Open `.env` and make sure your DB settings match Sail’s defaults:

```env
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

---

### 6. Run Migrations

```bash
sail artisan migrate
```

---

## 🧪 Testing the API

You can test your endpoints with:

- [Postman](https://www.postman.com/)

Example base URL:

```
http://localhost/api/...
```

---

## 🐳 Useful Sail Commands

```bash
sail artisan migrate          # Run DB migrations
sail artisan db:seed          # Seed the database
sail artisan test             # Run tests
sail down                     # Stop the containers
```

---

## 📂 Project Structure

This project follows a typical Laravel API structure:
- `routes/api.php` – Your API endpoints
- `app/Models` – Eloquent models
- `app/Http/Controllers` – API controllers
- `database/migrations` – DB schema
- `docker-compose.yml` – Sail services setup

## 📄 License

MIT License.