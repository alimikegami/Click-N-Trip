# Click N Trip

## How To Run This App?
- Make sure MySQL is installed
- Create .env file from .env.example and set the **DB_CONNECTION** to mysql, **DB_DATABASE** to click_n_trip, and **DB_USERNAME** to root
- Create database with the name of **click_n_trip**
- Run this command to create the tables and other database objects:
  ```bash
  php artisan migrate:fresh
  ```
- Run this command to seed the database with admin account:
  ```bash
  php artisan db:seed
  ```
- Run this command to serve the server:
  ```bash
  php artisan serve
  ```
