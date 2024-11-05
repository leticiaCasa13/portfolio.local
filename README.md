# portfolio

Download the project to your `/var/www/portfolio.local` folder.

Create a `VirtualHost` for the project with the `public/` folder as `DocumentRoot`.

From the root of your project, run `composer install` to get the associated libraries.

Change the `DatabaseController.php` file indicating your credentials.

Run the `src/db/schema.sql` file to dump the database information into your test environment.