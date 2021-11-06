<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// getenv("MODE")

$router->get('/', function () use ($router) {
    //return view('layout');
    return redirect('/dist/index.html');
});

$router->group(['prefix' => 'api/calc'], function () use ($router) {
    $router->get('logs', 'ApiController@calcAllLogs');
    $router->put('logs', 'ApiController@calcExpression');  
});
