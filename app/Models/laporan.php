<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class laporan
 * @package App\Models
 * @version April 18, 2018, 9:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection  user_id
 * @property \Illuminate\Database\Eloquent\Collection  perkara_id
 * @property integer
 * @property date waktu_lapor
 * @property integer
 * @property date waktu_kejadian
 * @property string tempat_kejadian
 * @property satring korban
 * @property string alamat_korban
 * @property string kerugian
 * @property string pelapor
 * @property string uraian_kejadian
 * @property string saksi
 * @property string pasal
 * @property string status_laporan
 * @property string no_surat
 * @property string lat
 * @property string long
 */
class laporan extends Model
{
    use SoftDeletes;

    public $table = 'laporans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'waktu_lapor',
        'perkara_id',
        'waktu_kejadian',
        'tempat_kejadian',
        'korban',
        'alamat_korban',
        'kerugian',
        'pelapor',
        'uraian_kejadian',
        'saksi',
        'pasal',
        'status_laporan',
        'no_surat',
        'tanggal_surat',
        'alasan',
        'lat',
        'long'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'waktu_lapor' => 'date',
        'perkara_id' => 'integer',
        'waktu_kejadian' => 'date',
        'tempat_kejadian' => 'string',
        'alamat_korban' => 'string',
        'kerugian' => 'string',
        'pelapor' => 'string',
        'uraian_kejadian' => 'string',
        'saksi' => 'string',
        'pasal' => 'string',
        'status_laporan' => 'string',
        'no_surat' => 'string',
        'lat' => 'string',
        'long' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'perkara_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function perkaras()
    {
        return $this->belongsTo(\App\Models\perkara::class, 'perkara_id', 'id');
    }

    public function profiles()
    {
        return $this->belongsTo(\App\Models\profile::class, 'user_id', 'user_id');
    }
}
