<?php

namespace App\Repositories;

use App\Models\feedbackInfo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class feedbackInfoRepository
 * @package App\Repositories
 * @version April 18, 2018, 7:26 am UTC
 *
 * @method feedbackInfo findWithoutFail($id, $columns = ['*'])
 * @method feedbackInfo find($id, $columns = ['*'])
 * @method feedbackInfo first($columns = ['*'])
*/
class feedbackInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info_id',
        'status_feed'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return feedbackInfo::class;
    }
}
