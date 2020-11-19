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
    return "topicapi";
});

$router->get('topics', 'TopicController@index');
$router->post('topic', 'TopicController@store');
$router->get('topic/{topic_id}', 'TopicController@show');
$router->put('topic/{topic_id}', 'TopicController@update');
$router->delete('topic/{topic_id}', 'TopicController@destroy');