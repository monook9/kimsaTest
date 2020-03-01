# Kimsa Test API

Test API for [Kimsa](https://kimsasoftware.com/) enterprise, great chance for change work!.

## Instrutions for start

```
1.- Clone the repository.
2.- Create a mysql database.
3.- Copy ".env.example" file to ".env" and edit the database params.
4.- Open the command line and get inside the project.
5.- Run command -> "composer install".
6.- Run command -> "php -S localhost:8000 -t public".
7.- Open your browser and go to "/key-generation" URL and copy the result into ".env" file in APP_KEY param.
8.- In command line run -> "php artisan migrate".
9.- In command line run -> "php artisan db:seed".
```

## Usage

```
1.- Open the command line and get inside the project.
2.- Run command -> "php -S localhost:8000 -t public".
3.- Open your browser and go to "/public/providers" URL.
```

## Correct Params

```
Pass params by get method.
- name : string.
- reputationMin : number
- reputationMax : number
- type_provider : number (1 | 2)
- pagination : number
```

## Technologies used

[Lumen micro-framework](https://lumen.laravel.com/)
