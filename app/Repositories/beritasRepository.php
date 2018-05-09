<?php

namespace App\Repositories;

use App\Models\beritas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class beritasRepository
 * @package App\Repositories
 * @version May 9, 2018, 3:44 am UTC
 *
 * @method beritas findWithoutFail($id, $columns = ['*'])
 * @method beritas find($id, $columns = ['*'])
 * @method beritas first($columns = ['*'])
*/
class beritasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'laporan_id',
        'judul',
        'foto_berita',
        'narasi',
        'lat',
        'long'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return beritas::class;
    }
}
