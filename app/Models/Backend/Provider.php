<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Provider
 * @package App\Models\Backend
 * @version November 4, 2021, 7:50 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string $cellphone
 * @property string $email
 * @property string $logo
 * @property string $page
 * @property string $address
 */
class Provider extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'providers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'cellphone',
        'email',
        'logo',
        'page',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'cellphone' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'page' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'cellphone' => 'required',
        'email' => 'required'
    ];

    
}
