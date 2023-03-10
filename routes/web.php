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
$router->group(['prefix' => 'api'], function () use ($router) {
  //USERS
  // Matches "/api/register
 $router->post('register/user', 'AuthController@register');
   // Matches "/api/login
  $router->post('login', 'AuthController@login');

  // Matches "/api/profile
  $router->get('profile', 'UserController@profile');

  // Matches "/api/users/1 
  //get one user by id
  $router->get('users/{id}', 'UserController@singleUser');

  // Matches "/api/users
  $router->get('users', 'UserController@allUsers');
  
  // PRODUCTS
  // Mostrar produtos OK
  $router->get('product', 'ProductsController@index');
  
  // Registrar um produto OK
  $router->post('register/product', 'ProductsController@register');

  // mostrar produto OK
  $router->get('product/show/{id}', 'ProductsController@show');

  // editar um produto OK
  $router->post('product/update/{id}', 'ProductsController@update');

  // deletar um produto OK
  $router->delete('product/delete/{id}', 'ProductsController@destroy');

});