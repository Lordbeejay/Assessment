 EDM Assessment - Client Management Module

Hi! This is my submission for the Jr. Web Developer Technical Exam. I built a simple Client Management module using Laravel 10.

 What I did

I chose Option B (Blade views) so you can see the UI in the browser. The app lets you add, view, edit, and delete clients. I also tried the bonus features:

- Filter clients by status (active/inactive)
- Used Bootstrap 5 for the UI
- Added duplicate email validation so you cant add the same email twice

 How to run it

1. Clone the repo

git clone https://github.com/Lordbeejay/Assessment.git
cd EDM_Assessment


2. Install dependencies

composer install


3. Setup the environment

cp .env.example .env
php artisan key:generate


4. Create the database (I used SQLite so its easier to test)

touch database/database.sqlite
php artisan migrate


5. Run the server

php artisan serve


Then go to http://localhost:8000 in your browser.

Files I created/modified

- app/Models/Client.php - the Client model
- app/Http/Controllers/ClientController.php - handles all the CRUD stuff
- app/Repositories/ClientRepository.php - repository pattern for database queries
- database/migrations/2024_01_01_000001_create_clients_table.php - migration for clients table
- routes/web.php - added the routes
- resources/views/layouts/app.blade.php - main layout with Bootstrap
- resources/views/clients/index.blade.php - shows all clients in a table
- resources/views/clients/create.blade.php - form to add a client
- resources/views/clients/edit.blade.php - form to edit a client

Notes:

- I used SQLite as the default database because its simpler to setup, no need for MySQL
- Bootstrap is loaded from CDN
- The repository pattern separates the database logic from the controller

Thank you for reviewing my work!
