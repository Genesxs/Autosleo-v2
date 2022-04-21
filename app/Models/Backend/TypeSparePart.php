<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TypeSparePart
 * @package App\Models\Backend
 * @version November 22, 2021, 9:37 pm UTC
 *
 * @property string $name
 */
class TypeSparePart extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'type_spare_parts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
