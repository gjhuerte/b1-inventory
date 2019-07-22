<?php

namespace App\Http\Services\Product;

use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Services\LoggerService as Logger;

class ProductService
{
    private $product;
    private $type;

    /**
     * Constructor class
     */
    public function __construct($type)
    {
        $this->type = $type;
        $this->product = Product::where('type_id', '=', $type);

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
     * Fetch all the products as paginated
     *
     * @return mixed
     */
    public function get($length = 10)
    {
        return $this->product->paginate($length);
    }

    /**
     * Find a certain product id if existed
     *
     * @param integer $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->product->where('id', '=', $id);
    }

    /**
     * Find a certain product id if existed
     *
     * @param integer $id
     * @return mixed
     */
    public function findFirst($id)
    {
        return $this->find($id)->first();
    }

    /**
     * Create a new record in database
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        $this->product = Product::create([
            'code' => $attributes['code'],
            'type_id' => $this->type,
        ]);

        $code = optional($this->product)->code;

        Logger::createForCurrentUser([
            'info' => "Created a new product {$code}",
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
        $this->product = $this->findFirst($id);
        $code = optional($this->product)->code;
        
        $this->product->update([
            'code' => $attributes['code'],
            'type_id' => $this->type,
        ]);

        Logger::createForCurrentUser([
            'info' => "Updated product {$code}",
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
        $this->product = $this->findFirst($id);
        $code = optional($this->product)->code;

        Logger::createForCurrentUser([
            'info' => "Removed  product {$code}",
            'data' => json_encode($this->product),
        ]);

        $this->product->delete();

        return $this->product;
    }

    /**
     * Fetch the count of the current
     * product
     *
     * @return double
     */
    public function count()
    {
        return $this->product->count();
    }
}
