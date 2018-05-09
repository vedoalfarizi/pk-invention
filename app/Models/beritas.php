<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class beritas
 * @package App\Models
 * @version May 9, 2018, 3:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection laporans
 * @property integer laporan_id
 * @property string judul
 * @property string foto_berita
 * @property string narasi
 * @property string lat
 * @property string long
 */
class beritas extends Model
{
    use SoftDeletes;

    public $table = 'beritas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'laporan_id',
        'judul',
        'foto_berita',
        'narasi',
        'lat',
        'long'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'laporan_id' => 'integer',
        'judul' => 'string',
        'foto_berita' => 'string',
        'narasi' => 'string',
        'lat' => 'string',
        'long' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'laporan_id' => 'required',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function laporans()
    {
        return $this->hasMany(\App\Models\laporans::class, 'id', 'laporan_id');
    }
}
