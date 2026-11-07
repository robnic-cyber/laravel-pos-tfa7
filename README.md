# Laravel POS — Account Management Laboratory

This Laravel POS project implements the TFA6 account-management extension:

- `/customers/create` creates customers with required, valid full name and email fields.
- `/customers/{customer}/edit` pre-fills and updates customer accounts.
- `/users/create` creates users with required, unique usernames and full names.
- `/users/{user}/edit` pre-fills and updates users and accepts an optional avatar upload.
- `/users` lists prepared 256×256 WebP avatars and uses a placeholder when no avatar exists.

## Requirements

- PHP 8.2+
- Composer
- GD enabled in PHP (used by Intervention Image)

## Setup and run

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open `http://127.0.0.1:8000`. The default SQLite database is created at `database/database.sqlite` when using the standard Laravel setup.

## Validation and file handling

Customer and user forms use Laravel request validation. Validation errors are shown beside the relevant field and submitted values are restored with `old()` on redisplay. User avatars are restricted to images no larger than 2MB, center-cropped to 256×256 with Intervention Image, encoded as WebP, stored on `Storage::disk('public')`, and represented in the database by only the generated relative path.

## MVC mapping

- `routes/web.php` defines the account routes.
- `CustomerController` and `UserController` handle validation and persistence.
- `Customer` and `User` are the Eloquent models.
- Blade templates in `resources/views/customers` and `resources/views/users` render the forms and listings.
- Migrations create the customers table and add `username`, `full_name`, and `avatar` to users.
- `DatabaseSeeder` provides repeatable sample customers and users.
