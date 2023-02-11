# Coin Tracker

Get notified when the price drops, don't miss the chance of becoming a gazillionaire!

# Getting started

## Installation

Clone the repository

    git clone git@github.com:bashcole/coin-tracker.git

Switch to the repo folder

    cd cointracker

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@gitlab.com:bashcole/cointracker.git
    cd cointracker
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Configuration

- `config/app/timeframe` - Timeframes used for chart filtering
- `config/app/exchange/driver` - The current exchange driver is Bitfinex.

## Database seeding

Run the database seeder and you're done

    php artisan migrate:refresh --seed

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

You can use the `cointracker.postman_collection.json` file to import the requests/tests to Postman.

# PHP Coding Standard PSR12

Run: `composer fix-cs`
