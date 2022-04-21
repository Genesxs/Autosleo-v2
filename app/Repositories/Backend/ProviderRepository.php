<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Provider;
use App\Repositories\BaseRepository;

/**
 * Class ProviderRepository
 * @package App\Repositories\Backend
 * @version November 4, 2021, 7:50 pm UTC
*/

class ProviderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'cellphone',
        'email',
        'logo',
        'page',
        'address'
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
        return Provider::class;
    }
}
