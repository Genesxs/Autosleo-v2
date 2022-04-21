<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Discount;
use App\Repositories\BaseRepository;

/**
 * Class DiscountRepository
 * @package App\Repositories\Backend
 * @version November 5, 2021, 7:57 pm UTC
*/

class DiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'porcent',
        'start_date',
        'end_date',
        'spare_part_id'
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
        return Discount::class;
    }
}
