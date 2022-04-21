<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Service;
use App\Repositories\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories\Backend
 * @version November 4, 2021, 6:40 pm UTC
*/

class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'value',
        'type_service_id'
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
        return Service::class;
    }
}
