# LOK RestAPI

## How to start local development enviorment
Step 1: `docker run --rm -v $(pwd):/app composer/composer install` (This install composer packages which includes laravel sail)
Step 2: `cp .env.example .env
Step 2: `vendor/bin/sail up -d`
Step 3: `./sail artisan key:generate`
Step 4: `v./sail artisan migrate`

U done
