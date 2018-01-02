<?php


$router->post('login', 'UserController@login');

$router->get('login', function () {
    return view('index');
})->name('login');

$router->get('create-user', function () {
    \App\User::create([
        'name' => 'Rob Burley',
        'email' => 'rcburley@icloud.com',
        'password' => 'C0l0ssus!',
    ]);
});

$router->post('logout', 'UserController@logout');

$router->post('/tasks', 'TasksController@store');
$router->get('/tasks/complete', 'TasksController@completed');
$router->get('/tasks/incomplete', 'TasksController@incompleted');
$router->post('/tasks/{task}/complete', 'TasksController@complete');

$router->get('{path}', function () {
    return view('index');
})->where('path', '(.*)');

