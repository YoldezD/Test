<?php

namespace App\Repositories;

use App\Models\Groupe;
use App\Repositories\BaseRepository;

/**
 * Class GroupeRepository
 * @package App\Repositories
 * @version February 25, 2023, 1:38 pm UTC
*/

class GroupeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nom',
        'created_at',
        'updated_at'
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
        return Groupe::class;
    }
}
