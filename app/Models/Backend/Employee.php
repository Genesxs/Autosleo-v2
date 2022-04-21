<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employee
 * @package App\Models\Backend
 * @version November 16, 2021, 12:24 pm UTC
 *
 * @property string $full_name
 * @property string $position
 * @property string $url_photo
 */
class Employee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employees';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'full_name',
        'position',
        'url_photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'position' => 'string',
        'url_photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'position' => 'required'
    ];

    
}
