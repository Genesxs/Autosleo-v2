<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Type_vehicle
 * @package App\Models\Backend
 * @version November 4, 2021, 4:35 pm UTC
 *
 * @property string $type_vehicle
 */
class Type_vehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'type_vehicles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_vehicle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_vehicle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_vehicle' => 'required'
    ];

    
}
