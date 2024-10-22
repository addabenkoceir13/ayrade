Hello 👋 AYRADE
===============

AYRADE Testing
=====================


## Technologies Used 
- Laravel v9
- PHP v8.2
- MySQL v8.1
- FilamentPHP v3

## Feature

- Authentication

- Admin Panel
     - User Management

- User Panel
    - Profile

## How To Use

### Download Repository
> clone repository
```bash
 git https://github.com/addabenkoceir13/ayrade
```
> open folder
```bash
 cd ayrade
```
> Create file .env
```bash
 cp .env.example .env.
```
> Generate Key Of .env
```bash
 php artisan key:generate.
```

### Create DataBase && Migration && Seeding
> Create DataBase
```bash
 CREATE DATABASE IF NOT EXISTS 'ayrade'
```
> Go to file .env
```bash
DB_DATABASE=ayrade
```
# Migration Table and seeder
```bash
 php artisan migrate --seed

```

### How to use the application

#### Admin Panel
> Type in the URL below.

[http://testayrad.test/](http://testayrad.test/)

> Details for logging in

> email
```bash
admin@gmail.com
```
> Register Admin 
Type in the URL below.

[http://testayrad.test/](http://testayrad.test/)
> passswoed
```bash
admin123
```
#### User Panel
> Type in the URL below.

[http://testayrad.test/](http://testayrad.test/)

> Details for logging in

> email
```bash
user@gmail.com
```
> passswoed
```bash
user12345
```
