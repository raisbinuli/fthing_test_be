## Source for backend customer

## How to install
- Rename .env.example to .env
- Change database configuration inside env file
- Run "composer install" in root folder 
- Run "php artisan key:generate" in root folder 
- Run "php artisan migrate" in root folder 
- Run "php artisan serve" in root folder 
- Please make sure inside the file config\cors.php for allowed_origins attributes is the same as domain for fthing_test_fe (vue frontend)