## How to setup the vendor without php and composer installed on operating system with docker (requires docker)
Step 1: `docker run --rm -v $(pwd):/app composer/composer install` (This install composer packages which includes laravel sail)
Step 2: `vendor/bin/sail up -d`
Step 3: `vendor/bin/sail artisan migrate`

U done

## How to start local development enviorment
Step 1: `docker run --rm -v $(pwd):/app composer/composer install` (This install composer packages which includes laravel sail)
Step 2: cp .env.example .env
Step 2: `vendor/bin/sail up -d`
Step 3: `vendor/bin/sail artisan migrate`

U done
