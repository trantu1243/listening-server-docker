# phim.backend

# Create .env file for config docker
```
$ cp .env-example .env
```
# Docker
```
$ docker-compose up -d --build

```

# Composer install
```
$ docker-compose exec app composer install

```
# Copy .env of app
```
$cd source

$cp .env.example .env

```
# Config DB in .env 
```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=listening_server
DB_USERNAME=root
DB_PASSWORD=secret

```

# Migrate and seed data
```
$ docker-compose exec app ash

[/work/app]

$php artisan migrate

$php artisan db:seed

```

# Access to website

```
http://localhost:12020

```
1