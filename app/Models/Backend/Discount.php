<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 * @package App\Models\Backend
 * @version November 5, 2021, 7:57 pm UTC
 *
 * @property \App\Models\Backend\SparePart $sparePart
 * @property number $porcent
 * @property string $start_date
 * @property string $end_date
 * @property integer $spare_part_id
 */
class Discount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'porcent',
        'start_date',
        'end_date',
        'spare_part_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'porcent' => 'double',
        'start_date' => 'date',
        'end_date' => 'date',
        'spare_part_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'porcent' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sparePart()
    {
        return $this->belongsTo(\App\Models\Backend\SparePart::class, 'spare_part_id', 'id');
    }
}
