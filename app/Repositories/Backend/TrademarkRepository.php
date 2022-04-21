<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Trademark;
use App\Repositories\BaseRepository;

/**
 * Class TrademarkRepository
 * @package App\Repositories\Backend
 * @version November 4, 2021, 3:22 pm UTC
*/

class TrademarkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'trademark'
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
        return Trademark::class;
    }
}
