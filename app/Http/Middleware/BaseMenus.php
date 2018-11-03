<?php

namespace App\Http\Middleware;

use Closure;

class BaseMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Main sidebar elements
        \Menu::make('sidebar', function ($menu) {

            $menu->add('<span>Статистка</span>', ['route' => 'home'])
                ->prepend('<i class="icon-pie5"></i> ');

            $menu->add('<span>Продажи</span>', ['route' => 'orders.index'])
                ->prepend('<i class="icon-statistics"></i> ')
                ->active('orders/*');

            $menu->add('<span>Товары</span>', ['route' => 'products.index'])
                ->prepend('<i class="icon-cart-add2"></i> ')
                ->active('products/*');

            $menu->add('<span>Пользователи</span>', ['route' => 'users.index'])
                ->prepend('<i class="icon-users4"></i> ')
                ->active('users/*');
        });

        return $next($request);
    }
}
