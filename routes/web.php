<?php
use Illuminate\Support\Str;
use App\User;
use App\Provider;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key-generation', function () {
    return Str::random(32);
});

$router->get('/providers', function () {
    return Provider::all();
});

$router->get('/users', function () {
    return User::all();
});
