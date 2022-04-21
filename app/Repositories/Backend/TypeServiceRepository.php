<?php

namespace App\Repositories\Backend;

use App\Models\Backend\TypeService;
use App\Repositories\BaseRepository;

/**
 * Class TypeServiceRepository
 * @package App\Repositories\Backend
 * @version November 4, 2021, 5:28 pm UTC
*/

class TypeServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return TypeService::class;
    }
}
