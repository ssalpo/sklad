<?php

namespace App\Repositories;

use App\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    /**
     * Добавляет нового пользователя в базу
     *
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {
        $attributes = $this->securePassword($attributes);

        return parent::create($attributes);
    }

    /**
     * Обновление данных пользователя
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $attributes, $id)
    {
        $attributes = $this->securePassword($attributes);

        return parent::update($attributes, $id);
    }

    /**
     * Шифрует пароль пользователя
     *
     * @param array $attributes
     * @return array
     */
    public function securePassword(array $attributes)
    {
        if (array_get($attributes, 'password')) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
            unset($attributes['password_confirmation']);
        }

        return $attributes;
    }
}
