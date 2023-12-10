# Laravel is a php framework , follows the mvc design patter (model , view , controller)
- model , representation of the database (representation of one table)
- view , the front end
- controller , what holds your logic which will be mapped into a route

# comands 
- create react application composer create-project laravel/laravel project_name
- php aritsan serve , serve our laravel project 
- php artisan migrate , will go into the migration folder and execute every file
- php artisan make:migration create_products_table , will create a file creating products table
- php artisan make:controller LaravelController
- route is a mapping between url and a controller
- route is a map from a url to a function
- every controller is responsible for a certain model 
- php artisan make:model Product
# file structure
- .env will never be pushed into my repos , it will be .gitignore
- .env contains environment variables
- storage will hold files got from the front end or in the public folder
- routes folder 