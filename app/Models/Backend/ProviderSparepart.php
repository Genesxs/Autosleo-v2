<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProviderSparepart
 * @package App\Models\Backend
 * @version November 10, 2021, 3:00 pm UTC
 *
 * @property \App\Models\Backend\Provider $provider
 * @property \App\Models\Backend\SparePart $sparePart
 * @property integer $provider_id
 * @property integer $spare_part_id
 */
class ProviderSparepart extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'provider_spare_parts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'provider_id',
        'spare_part_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'provider_id' => 'integer',
        'spare_part_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'provider_id' => 'required',
        'spare_part_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function provider()
    {
        return $this->belongsTo(\App\Models\Backend\Provider::class, 'provider_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sparePart()
    {
        return $this->belongsTo(\App\Models\Backend\SparePart::class, 'spare_part_id', 'id');
    }
}
