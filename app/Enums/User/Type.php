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
    public static function all()
    {
        return [
            self::ADMIN  => 'Administrator',
            self::REGULAR_USER => 'Regular User',
        ];
    }
}
