<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

// Продажи
Breadcrumbs::for('orders.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Продажи', route('orders.index'));
});

// Продажи > Добавление
Breadcrumbs::for('orders.create', function ($trail) {
    $trail->parent('orders.index');
    $trail->push('Новая продажа', route('orders.create'));
});

// Продажи > [Product Id] > Редактирование
Breadcrumbs::for('orders.edit', function ($trail, $id) {
    $trail->parent('orders.index');
    $trail->push('Редактирование: #' . $id, route('orders.edit', $id));
});


// Товары
Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Товары', route('products.index'));
});

// Товары > Добавление
Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products.index');
    $trail->push('Новый товар', route('products.create'));
});

// Товары > [Product Id] > Редактирование
Breadcrumbs::for('products.edit', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->push('Редактирование: ' . $product->name, route('products.edit', $product->id));
});

// Control
Breadcrumbs::for('control', function ($trail) {
    $trail->parent('home');
    $trail->push('Управление', route('users.index'));
});

// Пользователи
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('control');
    $trail->push('Пользователи', route('users.index'));
});

// Пользователи > Добавление
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Новый пользователь', route('users.create'));
});

// Пользователи > [User Id] > Редактирование
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Редактирование: ' . $user->name, route('users.edit', $user));
});