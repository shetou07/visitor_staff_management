# BK Visitor and Staff Management System

The BK Visitor and staff Management System is a web application built with Laravel that allows users to register and manage visitors and staff.
It also has an admin side that helps to generate reports for both the visitors and staff. 

## Prerequisites

Make sure you have the following software installed on your local machine:

- PHP (version 7.3 or higher)
- Composer
- MySQL

## Getting Started



1. Install the dependencies via `npm`:

   ```bash
   npm install
   ```

2. Install the dependencies via `composer`:

   ```bash
   composer install
   ```

3. Create a copy of the `.env.example` file and rename it to `.env`:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Update the `.env` file with your database credentials.

6. Run the database migrations:

   ```bash
   php artisan migrate
   ```

7. Start the local development server:

   ```bash
   php artisan serve
   ```

8. Access the application in your web browser at `http://localhost:8000`.

## Additional Configuration

- If you want to use a different web server (e.g., Apache or Nginx), configure it to point to the `public` directory of the project.


## Admin credentials
-Email: boss@admin.bk
-Password:boss@bk

## Security credentials
-Staff_ID:BK20
-Password:password1