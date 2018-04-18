<?php

namespace App\Repositories;

use App\Models\perkembanganLap;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class perkembanganLapRepository
 * @package App\Repositories
 * @version April 18, 2018, 9:08 am UTC
 *
 * @method perkembanganLap findWithoutFail($id, $columns = ['*'])
 * @method perkembanganLap find($id, $columns = ['*'])
 * @method perkembanganLap first($columns = ['*'])
*/
class perkembanganLapRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'laporan_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return perkembanganLap::class;
    }
}
