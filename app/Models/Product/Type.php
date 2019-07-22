<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Http\Services\Product\ProductService;

class Type extends Model
{
    protected $table = 'product_types';
    protected $primaryKey = 'id';
    
    /**
     * Items that can only be filled
     *
     * @var array
     */
    public $fillable = [
        'code',
        'name',
        'description',
    ];

    /**
     * Total count of entries inside this specific type
     *
     * @return double
     */
    public function getCountAttribute()
    {
        $service = new ProductService($this->id);
        return $service->count();
    }
}
