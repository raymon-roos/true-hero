# Bit Academy deep dive one-week project February 2024

In this one-week project, themed after the One-Punch Man universe, us four team members
built and administrative dashboard and [ELO-rating](https://en.wikipedia.org/wiki/Elo_rating_system)
system, on behalf of the fictional Hero Association. Project readme continues below:

---

# One Punch Man deep dive

This repository is home to the source code of the Heroes Association's new Hero Management
Platform And Social Network, developed by Caped Compiler Commandos.

## Installation instructions

**Requirements**

-   PHP 8.1 or higher
-   MariaDB 11.2 or higher, or similarly recent MySQL

Make sure you have a MariaDB user with at least read/update and create table permissions.
The `.env.example` file comes with credentials according to Bit Academy conventions.

1. `git clone git@git.nexed.com:caped-compiler-commandos/the-one-punch-man-deep-dive.git 
hero-platform && cd hero-platform` to retrieve the source.
2. `composer install && npm install && npm run build` to download dependencies.
3. `cp .env.example .env && php artisan key:generate` to set up environment variables.
4. `php artisan storage:link` to prepare for file uploads.
5. `php artisan migrate:fresh` to prepare the database
6. `php artisan db:seed` to produce some placeholder data
7. `php artisan serve` to start a local development http server.

You can now view the leaderboard at http://127.0.0.1:8000, and the admin panel at
http://127.0.0.1:8000/admin. If you chose to seed placeholder data, you can log in with
email: `t@t`, password: `test`. Otherwise, you will have to register an account first.

## A quick tour

On first opening the website, you'll be greeted with a striking interactive leaderboard
showing the profiles of the Association's top heroes. In the top left corner you'll find
a navigation menu. From there you can log in to the administration panel. There you'll
find a sidebar listing information that no doubt will be familiar to you as a Hero
Association staff member, such as hero and duel listings, as well as completed data
submission reviews submitted by your colleagues. Feel free to click around and explore!

You'll find that from each listing, you can access a specific entry to get a more detailed
view, which also includes a sub-listing of different kinds of related entries. Each page
has powerful actions available at the click of a button, letting you correct data with
maximum convenience!

When submitting records of a duel, our state-of-the-art ELO rating system will
automatically update the involved Hero's ELO-rating. Say goodbye to tedious pen-and-paper
maths!

We of Caped Compiler Commando's software team wish you the best of luck in your work of
aiding the Hero Association in its crucial mission of protecting society.
