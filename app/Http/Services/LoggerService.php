<?php

namespace App\Http\Services;

use App\Models\Audit\Log;
use Illuminate\Support\Facades\Auth;

class LoggerService
{
    private $log;
    private static $__instance;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->log = new Log;
    }

    /**
     * Descending date
     *
     * @return mixed
     */
    public function descendingDate()
    {
        $this->log = $this->log
            ->orderByDesc('created_at');

        return $this;
    }

    /**
     * Fetch all the products as paginated
     *
     * @return mixed
     */
    public function get($length = 10)
    {
        return $this->log->paginate($length);
    }

    /**
     * Create a new record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->log->create([
            'info' => $attributes['info'],
            'name' => $attributes['name'],
        ]);
    }

    /**
     * Create a new record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public static function createForCurrentUser($attributes)
    {
        if (self::$__instance == null) {
            self::$__instance = new self;
        }

        self::$__instance->create([
            'info' => $attributes['info'],
            'name' => Auth::user()->full_name,
        ]);

        return self::$__instance;
    }

    /**
     * Fetch the count of the current
     * product type
     *
     * @return double
     */
    public function count()
    {
        return $this->product->count();
    }
}
