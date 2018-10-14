<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->resource('products', 'ProductController');
$this->resource('orders', 'OrderController');