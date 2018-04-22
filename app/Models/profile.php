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

    protected $primaryKey = 'user_id';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'jekel',
        'username',
        'pekerjaan',
        'alamat',
        'no_hp',
        'file_ktp',
        'tempat_lahir',
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
        'file_ktp' => 'file',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'no_identitas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'jekel' => 'required',
        'username' => 'required',
        'pekerjaan' => 'required',
        'alamat' => 'required',
        'no_hp' => 'numeric',
        'file_ktp' => 'image',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'no_identitas' => 'numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\User::class, ' id', ' user_id');
    }
}
