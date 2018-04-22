<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class komentarInfo
 * @package App\Models
 * @version April 18, 2018, 7:30 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection  info_id
 * @property \Illuminate\Database\Eloquent\Collection  user_id
 * @property integer
 * @property integer
 * @property string komentar
 */
class komentarInfo extends Model
{
    use SoftDeletes;

    public $table = 'komentar_infos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'info_id',
        'user_id',
        'komentar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'info_id' => 'integer',
        'user_id' => 'integer',
        'komentar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function infoIds()
    {
        return $this->hasMany(\App\Models\ info_id::class, ' id', ' infos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userIds()
    {
        return $this->hasMany(\App\Models\ user_id::class, ' id', ' users');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
