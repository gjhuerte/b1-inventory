<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'audit_logs';
    protected $primaryKey = 'id';
    
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
