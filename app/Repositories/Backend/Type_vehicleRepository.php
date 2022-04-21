<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Type_vehicle;
use App\Repositories\BaseRepository;

/**
 * Class Type_vehicleRepository
 * @package App\Repositories\Backend
 * @version November 4, 2021, 4:35 pm UTC
*/

class Type_vehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_vehicle'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Type_vehicle::class;
    }
}
