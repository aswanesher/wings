# [Laravel Penjualan App - Technical test PT. Hermes Solusi Integrasi]

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation]
(https://laravel.com/docs/9.x)

Clone the repository

    git clone git@github.com:aswanesher/wings.git

Switch to the repo folder

    cd wings

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Import dummy data

    php artisan db:seed
    
Install NPM package for auth

    npm run install

Start the local development server

    php artisan serve
    
Run NPM

    npm run dev

You can now access the server at http://localhost:8000
