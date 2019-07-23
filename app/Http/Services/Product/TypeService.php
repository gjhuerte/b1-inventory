<?php

namespace App\Http\Services\Product;

use App\Models\Product\Type;
use Illuminate\Support\Facades\DB;
use App\Http\Services\LoggerService as Logger;

class TypeService
{
    private $product;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->product = new Type;

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
     * Search from the columns
     *
     * @param String $queryString
     * @return mixed
     */
    public function searchFrom($queryString)
    {
        $this->product = $this->product->where(function ($query) use ($queryString) {
            if (strlen($queryString) > 0) {
                $query->where('name', 'like', "%$queryString%")
                    ->orWhere('code', 'like', "%$queryString%")
                    ->orWhere('description', 'like', "%$queryString%");
            }
        });

        return $this;
    }

    /**
     * Fetch all the products as paginated
     *
     * @return mixed
     */
    public function get($length = 1)
    {
        return $this->product->paginate($length)
            ->appends(request()->query());
    }

    /**
     * Find a certain product id if existed
     *
     * @param integer $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->product->findOrFail((int) $id);
    }

    /**
     * Create a new record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        $this->product = $this->product->create([
            'code' => $attributes['code'],
            'name' => $attributes['name'],
            'description' => $attributes['description'],
        ]);

        $code = optional($this->product)->code;

        Logger::createForCurrentUser([
            'info' => "Created a new product type '{$code}'",
            'data' => json_encode($this->product),
        ]);

        return $this->product;
    }

    /**
     * Update an existing record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function update($attributes, $id)
    {
        $this->product = $this->find($id);

        $this->product->update([
            'code' => $attributes['code'],
            'name' => $attributes['name'],
            'description' => $attributes['description'],
        ]);

        $code = optional($this->product)->code;
        Logger::createForCurrentUser([
            'info' => "Updated product type '{$code}'",
            'data' => json_encode($this->product),
        ]);

        return $this->product;
    }

    /**
     * Remove a record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function delete($id)
    {
        $code = optional($this->product)->code;

        Logger::createForCurrentUser([
            'info' => "Remove product type '{$code}'",
            'data' => json_encode($this->product),
        ]);

        $this->product = $this->find($id);
        $this->find($id)->delete();

        return $this->product;
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
