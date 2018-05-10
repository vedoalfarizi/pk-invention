<?php

namespace App\Models;

use App\User;
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
        'file_foto',
        'narasi',
        'lat',
        'lng',
        'provinsi',
        'user_id'
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
        'file_foto' => 'file',
        'narasi' => 'string',
        'lat' => 'string',
        'lng' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'perkara_id' => 'required',
        'lat' => 'required',
        'lng' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function perkara()
    {
        return $this->belongsTo(perkara::class, 'perkara_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
