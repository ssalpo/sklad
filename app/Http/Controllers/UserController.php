<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\User;
use Wildside\Userstamps\Userstamps;

class UserController extends Controller
{
    use Userstamps;

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Выводит полный список пользователей
     */
    public function index()
    {
        $users = $this->repository->paginate(config('sklad.pagination.limit'));

        return view('users.index', compact('users'));
    }

    /**
     * Показывает форму добавления нового пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Добавляет нового пользователя в базу
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserRequest $request)
    {
        $this->repository->create($request->all());

        $message = 'Новый пользователя успешно добавлен!';

        return redirect()
            ->route('users.index')
            ->with('success', $message);
    }

    /**
     * Форма редактирования данных пользователя
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Обновление данных пользователя в базе
     *
     * @param UserRequest $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserRequest $request, $user)
    {
        $this->repository->update($request->all(), $user);

        $message = 'Данные пользователя успешно обновлены!';

        return redirect()
            ->route('users.index')
            ->with('success', $message);
    }

    public function destroy($user)
    {
        $this->repository->delete($user);

        $message = "Пользователь успешно удален!";

        return redirect()
            ->route('users.index')
            ->with('success', $message);
    }
}
