<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderSpare_parts extends Model
{
    use HasFactory;

    public $table = 'provider_spare_parts';

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
        'spare_part_id' => 'integer',
        'provider_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'spare_part_id' => 'required',
        'provider_id' => 'required'
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

