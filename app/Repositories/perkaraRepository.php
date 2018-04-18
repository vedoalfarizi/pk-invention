<?php

namespace App\Repositories;

use App\Models\perkara;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class perkaraRepository
 * @package App\Repositories
 * @version April 18, 2018, 2:28 am UTC
 *
 * @method perkara findWithoutFail($id, $columns = ['*'])
 * @method perkara find($id, $columns = ['*'])
 * @method perkara first($columns = ['*'])
*/
class perkaraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return perkara::class;
    }
}
