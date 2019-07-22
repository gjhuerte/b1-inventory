<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'audit_logs';
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
        'info',
        'name',
        'data',
    ];
}
