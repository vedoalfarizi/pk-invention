<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class info
 * @package App\Models
 * @version April 18, 2018, 7:13 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection perkaras
 * @property string judul
 * @property integer perkara_id
 * @property integer status_verifikasi
 * @property foto file
 * @property string narasi
 * @property string lat
 */
class info extends Model
{
    use SoftDeletes;

    public $table = 'infos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'judul',
        'perkara_id',
        'status_verifikasi',
        'file',
        'narasi',
        'lat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'perkara_id' => 'integer',
        'status_verifikasi' => 'integer',
        'narasi' => 'string',
        'lat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'perkara_id' => '1tm,perkaras,id,perkara_id',
        'lat' => 'long string text'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function perkaras()
    {
        return $this->hasMany(\App\Models\perkaras::class, 'id', 'perkara_id');
    }
}
