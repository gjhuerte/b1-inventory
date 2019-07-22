<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    
    /**
     * Additional attributes to auto-format
     * to date
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

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
