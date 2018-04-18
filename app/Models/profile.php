<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class profile
 * @package App\Models
 * @version April 18, 2018, 7:19 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection  users
 * @property integer user_id
 * @property integer jekel
 * @property string username
 * @property string pekerjaan
 * @property string alamat
 * @property string no_hp
 * @property string file_ktp
 * @property date tanggal_lahir
 * @property string no_identitas
 */
class profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'jekel' => 'integer',
        'username' => 'string',
        'pekerjaan' => 'string',
        'alamat' => 'string',
        'no_hp' => 'string',
        'file_ktp' => 'string',
        'tanggal_lahir' => 'date',
        'no_identitas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\ users::class, ' id', ' user_id');
    }
}
