# Laravel Project Installation Guide

## Prerequisites
Ensure you have the following installed on your system:
- [PHP](https://www.php.net/) (>=8.0 recommended)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & [NPM](https://www.npmjs.com/) (for frontend assets, if applicable)
- [MySQL](https://www.mysql.com/) or another supported database
- [Laravel](https://laravel.com/) CLI (optional but recommended)

## Installation Steps

### 1. Clone the Repository
```sh
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Copy Environment File
```sh
cp .env.example .env
```
Modify the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Run Database Migrations & Seeders (if applicable)
```sh
php artisan migrate --seed
```


### 6. Install NPM Packages (if using frontend assets)
```sh
npm install

npm run dev
```

### 7. Start the Development Server
```sh
php artisan serve
```
Your application should now be running at `http://127.0.0.1:8000`

## Additional Commands
- **Clear Cache:** `php artisan cache:clear`
- **Clear Config Cache:** `php artisan config:clear`
- **Run Queue Workers:** `php artisan queue:work`

## Troubleshooting
If you encounter issues, try:
```sh
composer dump-autoload
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

