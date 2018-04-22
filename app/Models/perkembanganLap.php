<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class perkembanganLap
 * @package App\Models
 * @version April 18, 2018, 9:08 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection  laporan_id
 * @property integer laporan_id
 */
class perkembanganLap extends Model
{
    use SoftDeletes;

    public $table = 'perkembangan_laps';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'laporan_id','keterangan',  'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'laporan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'laporan_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function laporans()
    {
        return $this->belongsTo(\App\Models\laporan::class, 'laporan_id', 'id');
    }
}
