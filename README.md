# LOK RestAPI

## ⚠️**IMPORTANT**⚠️
This project requires the [dev-proxy](https://git.minelast.de/deanomus/dev-proxy) from deanomus. The dev-proxy includes traefik and a database. <br>
https://git.minelast.de/deanomus/dev-proxy

## How to start local development enviorment
1. `docker run --rm -v $(pwd):/app composer/composer install` (This install composer packages which includes laravel sail)
2. `cp .env.example .env`
3. `vendor/bin/sail up -d`
4. `./sail artisan key:generate`
5. `./sail artisan migrate`


U done
