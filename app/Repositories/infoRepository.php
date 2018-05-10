<?php

namespace App\Repositories;

use App\Models\info;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class infoRepository
 * @package App\Repositories
 * @version April 18, 2018, 7:13 am UTC
 *
 * @method info findWithoutFail($id, $columns = ['*'])
 * @method info find($id, $columns = ['*'])
 * @method info first($columns = ['*'])
*/
class infoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'judul',
        'perkara_id',
        'status_verifikasi',
        'file_foto',
        'narasi',
        'lat',
        'lng'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return info::class;
    }
}
