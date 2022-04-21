<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SparePart
 * @package App\Models\Backend
 * @version November 5, 2021, 7:04 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $unit_value
 * @property string $image
 * @property integer $quantity
 * @property \App\Models\Backend\TypeSparePart $TypeSparePart
 * @property integer $type_spare_part_id
 */
class SparePart extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'spare_parts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'unit_value',
        'image',
        'quantity',
        'type_spare_part_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'unit_value' => 'integer',
        'image' => 'string',
        'quantity' => 'integer',
        'type_spare_part_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'unit_value' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeSparePart()
    {
        return $this->belongsTo(\App\Models\Backend\TypeSparePart::class, 'type_spare_part_id', 'id');
    }

    
}
