<?php

namespace App\Repositories\Backend;

use App\Models\Backend\SparePart;
use App\Repositories\BaseRepository;

/**
 * Class SparePartRepository
 * @package App\Repositories\Backend
 * @version November 5, 2021, 7:04 pm UTC
*/

class SparePartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'unit_value',
        'image',
        'quantity',
        'spare_part_type'
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
        return SparePart::class;
    }
}
