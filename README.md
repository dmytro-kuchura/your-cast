
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Starting Docker Compose

Checkout the repository or download the sources.

Simply run `docker-compose up -d` and you are done.

Nginx will be available on `localhost:80` and PostgreSQL on `localhost:5432`.

### Using Composer

`docker-compose exec php composer <COMMAND>`

Where `cmd` is any of the available composer command.

### Using PostgreSQL

Default connection:

`docker-compose exec database psql -U postgres`

Using .env file default parameters:

`docker-compose exec database psql -U dbuser dbname`

If you want to connect to the DB from another container (from the `php` one for instance), the host will be the service name: `db`.

### Backup your databases

``docker exec -t your-db-container pg_dumpall -c -U postgres > dump_`date +%Y-%m-%d"_"%H_%M_%S`.sql``

OR

``docker exec -t your-db-container pg_dumpall -c -U postgres | gzip > dump_`date +%Y-%m-%d"_"%H_%M_%S`.sql.gz``

Creates filename like dump_2023-12-25_09_15_26.sql

###Restore your databases

``cat your_dump.sql | docker exec -i your-db-container psql -U postgres``

### Using PHP

You can execute any command on the `podcasts_php` container as you would do on any docker-compose container:

`docker exec php php -v`

## Configuring PHP

To change PHP's configuration edit `.docker/php/php.ini`.
Same goes for `.docker/php/xdebug.ini`.

## Clear cache

```
docker-compose rm --all
docker-compose pull
docker-compose build --no-cache
docker-compose up -d --force-recreate
 ```

## SWAGGER

```
docker exec podcasts_php php artisan l5-swagger:generate
 ```

username = doadmin
password = AVNS_IPrxvgOjFCLophjvrZq
host = db-postgresql-fra1-do-user-4280286-0.c.db.ondigitalocean.com
port = 25060
database = defaultdb
sslmode = require