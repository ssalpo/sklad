<?php

namespace App\Http\Controllers;

use App\Criteria\TodayOrdersCriteria;
use App\Repositories\OrderRepository;

class HomeController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Страница статистики
     *
     * @return \Illuminate\Http\Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $ordersCount = [
            'today' => [
                'todayCount' => $this->orderRepository->todayCount(),
                'todayEarns' => $this->orderRepository->earnedToday(),
                'lossToday' => $this->orderRepository->lossToday()
            ]
        ];

        $orders = $this->orderRepository->pushCriteria(new TodayOrdersCriteria())->all();

        return view('home', compact('ordersCount', 'orders'));
    }
}
