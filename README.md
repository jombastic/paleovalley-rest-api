## About

This is a simple Laravel REST API application that can be called from a single page application or tested with postman. The routes are defined in the api.php file. The ones pointing to the product controller's store, update and delete methods are protected with laravel sanctum so that only logged in users can access them.
Also, only admin users are allowed to create, update and/or delete the products, and this is enabled by a gate called update-product which is defined in the boot method of the AuthServiceProvider. The show method fetches a speciffic product from the database, as specified in the task requirements.
I've also defined a login controller with an authenticate method which can be used by SPAs to login a user.

After seeding the database, 2 users will be created, one admin and one common user:
email: admin@example.org, password: secret,
email: user@example.org, password: password

## Installation

- Open the terminal.
- Run the command: composer install.
- Copy the .env.example to .env file.
- Setup the database connection in the .env file
- Run the command: php artisan key:generate to generate a unique app key
- Run the command: php artisan migrate --seed to create and seed the necessary tables in the database