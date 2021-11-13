# My Blog

A simple Laravel blog that allows for posting articles, and creating pages.

## Requirements

* Composer
* PHP 8.0+

## Installation

Download the latest version from the [production branch](https://github.com/JustinByrne/my-blog/tree/Production) and unzip it to the chosen directory, then run the following.

```bash
cd my-blog
composer install --no-dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
````

This will install the blog with an admin user with the following details. Currently these details can only be changed within the database.

email: `admin@example.com`<br>
password: `password`