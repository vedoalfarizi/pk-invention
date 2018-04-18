<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class feedbackInfo
 * @package App\Models
 * @version April 18, 2018, 7:26 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection  infos
 * @property integer info_id
 * @property integer status_feed
 */
class feedbackInfo extends Model
{
    use SoftDeletes;

    public $table = 'feedback_infos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'info_id',
        'status_feed'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'info_id' => 'integer',
        'status_feed' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function infos()
    {
        return $this->hasMany(\App\Models\ infos::class, ' id', ' info_id');
    }
}
