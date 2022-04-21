<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Service
 * @package App\Models\Backend
 * @version November 4, 2021, 6:40 pm UTC
 *
 * @property \App\Models\Backend\TypeService $typeService
 * @property string $description
 * @property integer $value
 * @property integer $type_service_id
 */
class Service extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'services';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'value',
        'type_service_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'value' => 'integer',
        'type_service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'value' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeService()
    {
        return $this->belongsTo(\App\Models\Backend\TypeService::class, 'type_service_id', 'id');
    }
}
