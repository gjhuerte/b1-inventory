<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Services\LoggerService as Logger;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $user;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->user = new User;

        DB::beginTransaction();
    }

    /**
     * Destructor class
     */
    public function __destruct()
    {
        DB::commit();
    }

    /**
     * Fetch all the users as paginated
     *
     * @return mixed
     */
    public function get($length = 10)
    {
        return $this->user->paginate($length);
    }

    /**
     * Find a certain user id if existed
     *
     * @param integer $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->user->findOrFail((int) $id);
    }

    /**
     * Create a new record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        $this->user = $this->user->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'type' => $attributes['type'],
            'password' => Hash::make($attributes['password']),
        ]);

        $code = optional($this->user)->code;

        Logger::createForCurrentUser([
            'info' => "Created a new user '{$code}'",
            'data' => json_encode($this->user),
        ]);

        return $this->user;
    }

    /**
     * Update an existing record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function update($attributes, $id)
    {
        $this->user = $this->find($id);

        $this->user->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'type' => $attributes['type'],
        ]);

        $code = optional($this->user)->code;
        Logger::createForCurrentUser([
            'info' => "Updated user '{$code}'",
            'data' => json_encode($this->user),
        ]);

        return $this->user;
    }

    /**
     * Remove a record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function delete($id)
    {
        $code = optional($this->user)->code;

        Logger::createForCurrentUser([
            'info' => "Remove user '{$code}'",
            'data' => json_encode($this->user),
        ]);

        $this->user = $this->find($id);
        $this->find($id)->delete();

        return $this->user;
    }

    /**
     * Fetch the count of the current
     * user type
     *
     * @return double
     */
    public function count()
    {
        return $this->user->count();
    }
}
