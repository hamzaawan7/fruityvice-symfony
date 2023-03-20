# Symfony Setup Guide for Existing Project

This guide will help you set up an existing Symfony project on your local machine. Make sure you have the required prerequisites installed before proceeding.

## Prerequisites

- PHP 8.0.0 or higher
- Composer (dependency manager for PHP)

If you don't have Composer installed, follow the installation guide on the official website: [https://getcomposer.org/download/](https://getcomposer.org/download/)

## Steps to Set Up an Existing Symfony Project

1. **Clone the repository:**
   
   Open your terminal and run the following command to clone the existing project repository:

`git clone https://github.com/hamzaawan7/fruityvice-symfony`

2. **Navigate to the project directory:**

`cd fruityvice_symfony`

3. **Install dependencies:**

Run the following command to install the required dependencies:

`composer install`


4. **Configure the environment:**

Make a copy of the `.env` file and rename it to `.env.local`. This file contains environment-specific configurations for your project.

`cp .env .env.local`

Open the `.env` file and modify the `DATABASE_URL` value to match your database settings.

Example for MySQL:

`DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name`


5. **Create the database schema and migrate data and run the command that gets the data from API:**

`php bin/console doctrine:database:create`

`php bin/console doctrine:migration:migrate`

`php bin/console app:get-all-fruits`

6. **Start the development server:**

If you have the Symfony CLI installed, you can start the development server by running:

`symfony server:start`

If you don't have the Symfony CLI installed, you can use the built-in PHP server:

`php -S localhost:8000 -t public`

The server will start at `http://localhost:8000`. You can access the Symfony project by opening this URL in your web browser.

Now, you're ready to start working on the existing Symfony project. Good luck!
