<?php

namespace App\Repositories;

use App\Models\komentarInfo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class komentarInfoRepository
 * @package App\Repositories
 * @version April 18, 2018, 7:30 am UTC
 *
 * @method komentarInfo findWithoutFail($id, $columns = ['*'])
 * @method komentarInfo find($id, $columns = ['*'])
 * @method komentarInfo first($columns = ['*'])
*/
class komentarInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info_id',
        'user_id',
        'komentar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return komentarInfo::class;
    }
}
