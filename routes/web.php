<?php

$this->get('/', function () {
    return redirect('login');
});

Auth::routes();

$this->group(['middleware' => 'auth'], function () {

    $this->get('/home', 'HomeController@index')->name('home');

    $this->resource('products', 'ProductController');
    $this->resource('orders', 'OrderController');
    $this->resource('users', 'UserController', ['except' => 'show']);
});