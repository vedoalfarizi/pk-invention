<?php

namespace App\Repositories;

use App\Models\profile;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class profileRepository
 * @package App\Repositories
 * @version April 18, 2018, 7:19 am UTC
 *
 * @method profile findWithoutFail($id, $columns = ['*'])
 * @method profile find($id, $columns = ['*'])
 * @method profile first($columns = ['*'])
*/
class profileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'jekel',
        'username',
        'pekerjaan',
        'alamat',
        'no_hp',
        'file_ktp',
        'tanggal_lahir',
        'no_identitas'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return profile::class;
    }
}
