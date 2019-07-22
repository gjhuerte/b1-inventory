<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    /**
     * Items that can only be filled
     *
     * @var array
     */
    public $fillable = [
        'code',
        'type_id',
    ];
}
