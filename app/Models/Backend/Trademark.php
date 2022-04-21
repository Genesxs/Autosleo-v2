<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Trademark
 * @package App\Models\Backend
 * @version November 4, 2021, 3:22 pm UTC
 *
 * @property string $trademark
 */
class Trademark extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'trademarks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'trademark'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trademark' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trademark' => 'required'
    ];

    
}
