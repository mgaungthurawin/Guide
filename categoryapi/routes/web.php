<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return "category";
});

$router->get('categories', 'CategoryController@index');
$router->post('category', 'CategoryController@store');
$router->get('category/{category_id}', 'CategoryController@show');
$router->put('category/{category_id}', 'CategoryController@update');
$router->delete('category/{category_id}', 'CategoryController@destroy');
