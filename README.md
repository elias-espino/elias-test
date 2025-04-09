# Laravel Project - Installation Guide

## Description
This is a Laravel project that includes user authentication, image upload, and image viewing functionality. The application uses SQLite as the database.

---

## Prerequisites
Before starting, make sure you have the following installed:

- **PHP** >= 8.0
- **Composer** (for managing PHP dependencies)
- **Node.js** and **NPM** (for managing frontend dependencies)
- **Laravel** 11.x
- **SQLite** (used as the database for this project)

---

## Installation

### 1. Clone the Repository
Clone the project repository to your local machine:

```bash
git clone https://github.com/elias-espino/elias-test
cd elias-test
```

### 2. Install PHP Dependencies
Run the following command to install the PHP dependencies:

```bash
composer install
```

### 3. Install JavaScript Dependencies
Run the following command to install the frontend dependencies:

```bash
npm install
```

### 4. Set Up the .env File
Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Then, configure the .env file for SQLite:

#### SQLite Configuration:
```ini
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/your/project/database/database.sqlite
```

Make sure the path to database.sqlite is correct. A typical path might be:

```ini
DB_DATABASE=./database/database.sqlite
```

### 5. Generate the Application Key
Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 6. Run Migrations
Run the migrations to create the necessary database tables:

```bash
php artisan migrate
```

### 7. Seed the Database (Optional)
If you want to populate the database with sample data, run:

```bash
php artisan db:seed
```

### 8. Create Storage Link (For Image Uploads)
If your application involves image uploads, create a symbolic link from storage to public to make uploaded images accessible:

```bash
php artisan storage:link
```

### 9. Serve the Application
You can use Laravel's built-in development server to serve the application:

```bash
php artisan serve
```

This will make the application available at http://localhost:8000.

### 10. Frontend Asset Compilation (Optional)
If your project has frontend assets, compile them by running:

```bash
npm run dev
```

For a production build, run:

```bash
npm run production
```

### 11. Access the Application
Once the setup is complete, open your browser and go to:

```bash
http://localhost:8000
```

You should be able to access the Laravel homepage.

### 12. Login and Register
To test the authentication system:

- **Login**: Go to `/login`.
- **Register**: Go to `/register` to create a new account.

---

## Features
- **User Authentication**: Users can register and log in using the built-in Laravel authentication system.
- **Image Management**: Users can upload, view, and delete images. The images are associated with each user.
- **Image Carousel**: Users can view their uploaded images in an interactive carousel.
- **Pagination**: The images page is paginated to improve the user experience when handling large numbers of images.

---

## Troubleshooting
If you encounter issues during installation or setup, try the following:

- **Missing dependencies**: If you face issues with missing dependencies, make sure to run `composer install` and `npm install` again.
- **Permissions**: Ensure the `storage` and `bootstrap/cache` directories are writable:

```bash
chmod -R 775 storage bootstrap/cache
