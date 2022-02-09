<h1 align="center">Sobat Manga</h1>

## Description

Sobat Manga is simple CRUD web app built with Laravel. This project use for my Final Project Exam.This project is crap and need more development (If i still remember :P)

## Install

**Clone Repository**

```bash
git clone https://github.com/karuniawanekasakti/sobat-manga
```

**Download zip**

```bash
extract file zip
```


## Install composer

```bash
composer install
```

## Copy .Env

```bash
copy .env.example menjadi .env
```

## Create database 

```bash
DB_DATABASE : **your db name**
```

## Setting database di .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_aplikasi
DB_USERNAME=**your mysql name**
DB_PASSWORD=**your mysql password**
```

## Generate key

```bash
php artisan key:generate
```

## Jalankan migrate dan seeder

```bash
php artisan migrate --seed
```

## Jalankan Serve

```bash
php artisan serve
```

