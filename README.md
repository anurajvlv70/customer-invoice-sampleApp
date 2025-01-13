Here's the updated installation guide with your specific database fields:

---

# Customer Invoice Sample App

This project is built using the PHP Laravel framework. Follow the steps below to set up and run the application locally.

## Requirements
- **PHP** (>=8.0)
- **Composer** (Dependency Manager for PHP)
- **XAMPP** (or any other local server with MySQL support)
- **Node.js** (for npm)

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/anurajvlv70/customer-invoice-sampleApp.git
   cd customer-invoice-sampleApp
   ```

2. **Set Up Environment**
   - Copy the `.env.example` file and rename it to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=user
     DB_USERNAME=root
     DB_PASSWORD=
     DB_COLLATION=utf8mb4_unicode_ci
     ```

3. **Install Dependencies**
   - Install PHP dependencies:
     ```bash
     composer install
     ```
   - Install Node.js dependencies:
     ```bash
     npm install
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   Create the database (`user`) in your MySQL server and run migrations:
   ```bash
   php artisan migrate
   ```

## Running the Application

1. **Start the Laravel Development Server**
   Open a terminal and run:
   ```bash
   php artisan serve
   ```

   The application will be available at [http://localhost:8000](http://localhost:8000).

2. **Compile Frontend Assets**
   In another terminal, run:
   ```bash
   npm run dev
   ```

   This will compile and watch the frontend assets for changes.

## Additional Notes
- Ensure that XAMPP (or your preferred local server) is running.
- If you encounter any issues, check your PHP and Node.js versions to ensure compatibility with Laravel.

## Useful Commands
- **Clear Cache:**
  ```bash
  php artisan cache:clear
  ```
- **Run Database Seeding:**
  ```bash
  php artisan db:seed
  ```
- **Run Unit Tests:**
  ```bash
  php artisan test
  ```


---
