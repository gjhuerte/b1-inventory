<?php

namespace App\Enums\User;

class Type
{
    const ADMIN = 'admin';
    const REGULAR_USER = 'regular_user';

    /**
     * Fetch all the user types
     *
     * @return array
     */
    public function all()
    {
        return [
            'ADMIN' => self::ADMIN,
            'REGULAR_USER' => self::REGULAR_USER,
        ];
    }
}
