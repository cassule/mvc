<?php

require_once ("vendor/autoload.php");
require_once ("init.php");

$app = new \Slim\App([ 'settings' => [
    'displayErrorDetails' => true
    ]
]);
  
$app->get('/', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->index(); 
    
});
 
 
$app->get('/add', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->create();

});
 
$app->post('/add', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->store();
});
 
$app->get('/edit/{id}', function ($request)
{

    $id = $request->getAttribute('id');
 
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->edit($id);
});
 

$app->post('/edit', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->update();
});
 

$app->get('/remove/{id}', function ($request)
{
    
    $id = $request->getAttribute('id');
 
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->remove($id);
});
 
$app->run();
?>