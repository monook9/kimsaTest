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

$router->get('/public/providers', function () {
    $search = '6I12h';

    $provider = Provider::
    with(array('institution'=>function($query) use($search) {
        $query->select('id','name','logo')->where('name','LIKE','%'.$search.'%');
    }))
    ->with(array('user'=>function($query) use($search) {
        $query->select('id','first_name','last_names','avatar')->where('first_name','LIKE','%'.$search.'%');
    }))
    ->with('ratings_summary:id,avg,count')
    ->with('setting:id,allow_public_quotation,allow_public_scheduling')
    ->whereHas('institution', function ($query) use($search) {
        $query->where('name','LIKE','%'.$search.'%');
    })
    ->OrWhereHas('user', function ($query) use($search) {
        $query->where('first_name','LIKE','%'.$search.'%');
    })
    ->paginate(5);

    return response()->json(
        [
            'code' => '200' ,
            'result' => ['providers' => $provider]
        ], 200); 
});
