# One Punch Man deep dive

This repository is home to the source code of the Heroes Association's new Hero Management
Platform And Social Network, developed by Caped Compiler Commandos.

## Installation instructions

**Requirements**

-   PHP 8.1 or higher
-   MariaDB 11.w or higher

Make sure you have a MariaDB user with at least read/update and create table permissions.
The `.env.example` file comes with credentials according to Bit Academy conventions.

1. `git clone git@git.nexed.com:caped-compiler-commandos/the-one-punch-man-deep-dive.git
    hero-platform && cd hero-platform` to retrieve the source.
2. `composer install && npm install && npm run build` to download dependencies.
3. `cp .env.example .env && php artisan key:generate` to set up environment variables.
4. `php artisan migrate:fresh --seed` to fill some placeholder data into the database.
5. `php aritisan serve` to start a local development http server.
